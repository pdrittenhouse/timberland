const menus = [].slice.call(document.querySelectorAll('.block-menu'));
const currentUrl = window.location.href;

menus.forEach(menu => {
  const items = [].slice.call(menu.querySelectorAll('.nav-item'));


  items.forEach(item => {
    const link = item.querySelector('.nav-link').getAttribute('href');


    if (currentUrl.includes(link)) {
      item.classList.add('current');
    }
  });
});
