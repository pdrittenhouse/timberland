import './patternlab/source/_patterns/00-protons/printing/wordpress/admin/_admin.scss';
import $ from 'jquery';

////////////////////////////////////////////////////////////////
// WP Customizer
////////////////////////////////////////////////////////////////

// Customizer Unit Selector
const getNextSibling = (elem, selector) => {
  // Get the next sibling element
  let sibling = elem.nextElementSibling;

  // If there's no selector, return the first sibling
  if (!selector) return sibling;

  // If the sibling matches our selector, use it
  // If not, jump to the next sibling and continue the loop
  while (sibling) {
    if (sibling.matches(selector)) return sibling;
    sibling = sibling.nextElementSibling;
  }
};

const unitSelector = () => {
  const selectors = [].slice.call(
    document.querySelectorAll('[id*="customize-control-unit_selector"]')
  );

  if (selectors !== null) {
    selectors.forEach(selector => {
      const inputs = [].slice.call(selector.querySelectorAll('input'));
      const group = selector.id.split('--')[1];
      const number = getNextSibling(selector, `[id*="${group}"][id*="number"]`);
      const range = getNextSibling(selector, `[id*="${group}"][id*="range"]`);
      let selected = selector.querySelector('input:checked').value;
      const applyClass = () => {
        if (selected === 'px') {
          number.classList.add('show');
          number.classList.remove('hide');
          range.classList.add('hide');
          range.classList.remove('show');
        } else if (selected === 'pct' || selected === 'vw' || selected === 'vh') {
          number.classList.add('hide');
          number.classList.remove('show');
          range.classList.add('show');
          range.classList.remove('hide');
        }
      };

      applyClass();

      if (inputs !== null) {
        inputs.forEach(input => {
          input.addEventListener('change', () => {
            selected = selector.querySelector('input:checked').value;
            applyClass();
          });
        });
      }
    });
  }
};

$(document).ready(() => {
  unitSelector();
});


////////////////////////////////////////////////////////////////
// Blocks
////////////////////////////////////////////////////////////////

// Restrict Blocks
// @link: https://wordpress.org/support/topic/allowing-core-blocks-only-within-custom-inner-blocks/
// const blocksArray = ['acf/column', 'acf/accordion-item'];

// function addParentAttribute(settings, name) {
//   if (!blocksArray.includes(name)) {
//     return settings;
//   }
//
//   return Object.assign(settings, {
//     parent: ['acf/row', 'acf/accordion'],
//   });
// }

const scopedBlocks = [
 {
   block: 'acf/column',
   parent: 'acf/row',
 },
 {
   block: 'acf/accordion-item',
   parent: 'acf/accordion',
 },
 {
   block: 'acf/button-text',
   parent: 'acf/button',
 },
 {
   block: 'acf/group',
   parent: 'acf/button-group',
 },
 {
   block: 'acf/slide',
   parent: 'acf/slider',
 },
 {
   block: 'acf/tab',
   parent: 'acf/tabs',
 },
 {
   block: 'acf/table-head',
   parent: 'acf/table',
 },
 {
   block: 'acf/table-body',
   parent: 'acf/table',
 },
 {
   block: 'acf/table-foot',
   parent: 'acf/table',
 },
 {
   block: 'acf/table-row',
   parent: ['acf/table-head', 'acf/table-body', 'acf/table-foot'],
 },
 {
   block: 'acf/table-cell',
   parent: 'acf/table-row',
 },
];

let blocks = [];

scopedBlocks.forEach(block => {
 blocks = [...blocks, block.block];
});

// Build a map: blockName -> Set of parent names
const parentsByBlock = scopedBlocks.reduce((acc, { block, parent }) => {
 const list = Array.isArray(parent) ? parent : [parent];
 acc[block] = acc[block] || new Set();
 list.forEach((p) => acc[block].add(p));
 return acc;
}, {});

function addParentAttribute(settings, name) {
 const parents = parentsByBlock[name];
 if (!parents) {
   return settings;
 }

 return Object.assign(settings, {
   parent: Array.from(parents),
 });
}

wp.hooks.addFilter('blocks.registerBlockType', 'dream/updater', addParentAttribute);


// Register Block Styles
// wp.blocks.registerBlockStyle( 'core/image', {
//   name: 'full-height',
//   label: 'Full Height',
// } );


// Register Block Variations
wp.blocks.registerBlockVariation('core/query', {
  name: 'core/query/card',
  title: 'Card Query',
  description: 'Displays a list of posts',
  isActive: ({ namespace, query }) => {
    return namespace === 'core/query/card' && query.postType === query.postType;
  },
  icon: 'grid-view',
  attributes: {
    namespace: 'core/query/card',
    query: {
      perPage: 6,
      pages: 0,
      offset: 0,
      postType: 'post',
      order: 'desc',
      orderBy: 'date',
      author: '',
      search: '',
      exclude: [],
      sticky: '',
      inherit: false,
    },
  },
  scope: ['inserter'],
  innerBlocks: [
    [
      'core/post-template',
      { className: 'card-query' },
      [
        [
          'acf/card',
          {},
          [
            ['core/post-featured-image', { className: 'card-image' }],
            ['core/post-date', { className: 'card-label' }],
            ['core/post-title', { className: 'card-title' }],
            ['core/post-excerpt', { className: 'card-text' }],
          ],
        ],
      ],
    ],
    ['core/query-pagination'],
    ['core/query-no-results'],
  ],
});


////////////////////////////////////////////////////////////////
// ACF Fields
////////////////////////////////////////////////////////////////
//
// $(document).ready(() => {
//   if ( typeof acf !== 'undefined' ) {
//     // eslint-disable-next-line no-undef
//     console.log('acf', acf.getField('field_63d61939d84bd'));
//     // eslint-disable-next-line no-undef
//     const taxonomy = acf.getField('field_63d61939d84bd');
//
//     console.log('tax: ', taxonomy);
//
//     taxonomy.on('change', e => {
//       console.log('Field changed');
//       console.log('event: ', e);
//     });
//     // acf.addFilter('select2_ajax_data',(data, args, $input, field) => {
//     //
//     //   // Get the taxonomy field instance
//     //   // eslint-disable-next-line no-undef
//     //   const taxonomy = acf.getFields({
//     //     name: 'taxonomy'
//     //   })[0];
//     //
//     //   if (taxonomy !== undefined && (data.field_key === field.get('key'))) {
//     //     data.selected_taxonomy = taxonomy.val();  // Here is the magic ;)
//     //   }
//     // });
//   }
// });
