document.addEventListener("DOMContentLoaded", () => {
  const blocks = [].slice.call(document.querySelectorAll('.block-tabs'));

  if (blocks !== undefined && blocks !== null && blocks !== []) {
    blocks.forEach(block => {
      if (block.classList.contains('jquery')) {
        // Add jQuery tabs
        const tabs = block.querySelector('.tabs');
        // const tabsId = tabs.getAttribute('id');
        const wrappers = [].slice.call(block.querySelectorAll('.tabs__content-wrapper'));

        wrappers.forEach(wrapper => {
          const label = wrapper.dataset.label;
          const id = wrapper.getAttribute('id');
          const link = `<li class="tabs__tab"><a href="#${id}" class="tabs__tab-link">${label}</a></li>`;
          tabs.innerHTML += link;
        });
      } else if (block.classList.contains('bootstrap')) {
        // Add Bootstrap tabs
        const tabs = block.querySelector('nav .nav');
        const wrappers = [].slice.call(block.querySelectorAll('.tab-pane'));
        const type = tabs.classList.contains('nav-tabs') ? 'tab' : 'pill';
        // let count = 0;
        let activated = false;
        wrappers.forEach(wrapper => {
          // count = count + 1;
          const label = wrapper.dataset.label;
          const id = wrapper.getAttribute('id');
          const buttonId = wrapper.getAttribute('aria-labelledby');
          const active = wrapper.dataset.active === 'show' && activated === false ? 'active' : '';
          // const active = count === 1 ? 'active' : '';
          const link = `<button class="nav-link ${active}" id="${buttonId}" data-bs-toggle="${type}" data-bs-target="#${id}" type="button" role="tab" aria-controls="${id}" aria-selected="true">${label}</button>`;
          if (wrapper.dataset.active === 'show' && activated === false) {
            wrapper.classList.add('show');
            wrapper.classList.add('active');
            activated = true;
          }
          tabs.innerHTML += link;
        });
      }
    });
  }

});

