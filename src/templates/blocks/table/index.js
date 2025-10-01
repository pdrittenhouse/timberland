/**
 * Table Block - Editor JavaScript
 * Custom placeholder interface for ACF table block
 */

(function (wp) {
  const { addFilter } = wp.hooks;
  const { useSelect, dispatch } = wp.data;
  const { createBlocksFromInnerBlocksTemplate } = wp.blocks;
  const { useBlockProps } = wp.blockEditor;
  const { Placeholder, CheckboxControl, Button, __experimentalNumberControl } = wp.components;
  const { createElement, useState, useCallback } = wp.element;

  const BLOCK = 'acf/table';

  // Setup UI lives in its own component so hooks aren't conditional
  const SetupUI = ({ clientId, attributes }) => {
    const blockProps = useBlockProps();
    const [includeHeader, setIncludeHeader] = useState(false);
    const [includeFooter, setIncludeFooter] = useState(false);
    const [rowCount, setRowCount] = useState(3);
    const [columnCount, setColumnCount] = useState(3);
    const [headerRows, setHeaderRows] = useState(1);
    const [footerRows, setFooterRows] = useState(1);

    const buildTemplate = () => {
      const template = [];

      // Helper function to create a row with the specified number of cells
      const createRow = () => {
        const cells = [];
        for (let i = 0; i < columnCount; i++) {
          cells.push(['acf/table-cell', {}]);
        }
        return ['acf/table-row', {}, cells];
      };

      // Helper function to create multiple rows
      const createRows = (count) => {
        const rows = [];
        for (let i = 0; i < count; i++) {
          rows.push(createRow());
        }
        return rows;
      };

      if (includeHeader) {
        template.push(['acf/table-head', {}, createRows(headerRows)]);
      }

      // Always include body with the specified number of rows
      template.push(['acf/table-body', {}, createRows(rowCount)]);

      if (includeFooter) {
        template.push(['acf/table-foot', {}, createRows(footerRows)]);
      }

      return template;
    };

    const createTable = useCallback(() => {
      try {
        const template = buildTemplate();
        const blocks = createBlocksFromInnerBlocksTemplate(template);

        // Set ACF field values based on selections
        const newAttributes = {
          ...attributes,
          data: {
            ...attributes.data,
            include_header: includeHeader,
            include_footer: includeFooter,
            default_rows: rowCount,
            default_columns: columnCount,
            header_rows: headerRows,
            footer_rows: footerRows
          }
        };

        // Update block attributes first
        dispatch('core/block-editor').updateBlockAttributes(clientId, newAttributes);

        // Then add inner blocks with no template locking
        dispatch('core/block-editor').replaceInnerBlocks(clientId, blocks, false);
      } catch (error) {
        console.error('Error creating table blocks:', error);
      }
    }, [includeHeader, includeFooter, rowCount, columnCount, headerRows, footerRows, clientId, attributes]);

    return createElement(
      'div',
      blockProps,
      createElement(Placeholder, {
        label: 'Table Setup',
        instructions: 'Choose which sections to include in your table.'
      },
        createElement('div', {
          style: { width: 'calc((100% - 48px) / 3)', minWidth: '268px' }
        },
          createElement(CheckboxControl, {
            label: 'Header Section (thead)',
            help: 'Add a header row with column titles',
            checked: includeHeader,
            onChange: setIncludeHeader
          }),
          createElement(CheckboxControl, {
            label: 'Footer Section (tfoot)',
            help: 'Add a footer row for summaries or totals',
            checked: includeFooter,
            onChange: setIncludeFooter
          })
        ),
        createElement('div', {
          style: { width: 'calc((100% - 48px) / 3)', minWidth: '150' }
        },
          createElement(__experimentalNumberControl, {
            label: 'Columns',
            value: columnCount,
            onChange: (value) => setColumnCount(parseInt(value) || 1),
            min: 1,
            max: 10,
            step: 1,
            style: { minWidth: '150px' }
          }),
          createElement(__experimentalNumberControl, {
            label: 'Body Rows',
            value: rowCount,
            onChange: (value) => setRowCount(parseInt(value) || 1),
            min: 1,
            max: 20,
            step: 1,
            style: { minWidth: '150px' }
          }),
          includeHeader && createElement(__experimentalNumberControl, {
            label: 'Header Rows',
            value: headerRows,
            onChange: (value) => setHeaderRows(parseInt(value) || 1),
            min: 1,
            max: 10,
            step: 1,
            style: { minWidth: '150px' }
          }),
          includeFooter && createElement(__experimentalNumberControl, {
            label: 'Footer Rows',
            value: footerRows,
            onChange: (value) => setFooterRows(parseInt(value) || 1),
            min: 1,
            max: 10,
            step: 1,
            style: { minWidth: '150px' }
          })
        ),
        createElement('div', {
          style: { width: 'calc((100% - 48px) / 3)', minWidth: '101px', display: 'flex', justifyContent: 'center', paddingTop: '20px' }
        },
          createElement(Button, {
            variant: 'primary',
            onClick: createTable
          }, 'Create Table')
        )
      )
    );
  };

  const WithTableSetup = (BlockEdit) => (props) => {

    if (props.name !== BLOCK) return createElement(BlockEdit, props);

    // This hook is always called for this block type — order stays consistent
    const hasChildren = useSelect(
      (select) => {
        const blocks = select('core/block-editor').getBlocks(props.clientId);
        return blocks.length > 0;
      },
      [props.clientId]
    );


    return hasChildren
      ? createElement(BlockEdit, props)
      : createElement(SetupUI, { clientId: props.clientId, attributes: props.attributes });
  };

  addFilter('editor.BlockEdit', 'acf-table/setup-placeholder', (BlockEdit) => WithTableSetup(BlockEdit));

})(window.wp);