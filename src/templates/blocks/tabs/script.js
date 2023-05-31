document.addEventListener("DOMContentLoaded", () => {
  const blocks = [].slice.call(document.querySelectorAll('.block-tabs'));

  if (blocks !== undefined && blocks !== null && blocks !== []) {
    blocks.forEach(block => {
      const tabs = block.querySelector('.tabs');
      // const tabsId = tabs.getAttribute('id');
      const wrappers = [].slice.call(block.querySelectorAll('.tabs__content-wrapper'));

      wrappers.forEach(wrapper => {
        const label = wrapper.dataset.label;
        const id = wrapper.getAttribute('id');
        const link = `<li class="tabs__tab"><a href="#${id}" class="tabs__tab-link">${label}</a></li>`;
        tabs.innerHTML += link;
      });
    });
  }

});

