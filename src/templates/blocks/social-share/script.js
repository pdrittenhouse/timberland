document.addEventListener("DOMContentLoaded", () => {
  const blocks = [].slice.call(document.querySelectorAll('.block-social-share'));

  if (blocks !== undefined && blocks !== null && blocks.length) {
    blocks.forEach(block => {
        const items = [].slice.call(block.querySelectorAll('.social-nav-item'));

        items.forEach(item => {
            const link = item.querySelector('.social-nav-link');

            if (item.classList.contains('service-copy')) {
                 // Copy text
                // @link: https://www.w3schools.com/howto/howto_js_copy_clipboard.asp
                const copied = block.querySelector('.copied');
                link.addEventListener('click', e => { 
                    const copyText = item.dataset.clipboardText;
                    e.preventDefault();
                    navigator.clipboard.writeText(copyText);
                    copied.classList.remove('hide');
                    setTimeout(() => {
                        copied.classList.add('hide');
                    }, 1500);
                });
            } else if (!item.classList.contains('service-email')) {
                console.log(item);
                const href = link.getAttribute('href');
                link.addEventListener('click', e => { 
                    e.preventDefault();
                    window.open(href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
                });
            }
        });
    });
  }
});