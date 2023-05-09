/**
 * nav
 */

import $ from 'jquery';

// Module styles
import './_nav.scss';

export const name = 'nav';

const navEnable = () => {
  // Find our component within the DOM
  const $nav = $('.nav');

  // Bail if component does not exist
  if (!$nav.length) {
    return;
  }

  // An example of what could be done with this component
  $nav.map((i, nav)=> {
    $(nav).addClass('js-nav-exists');
    return $nav;
  });
};

// Override default Bootstrap menu behavior
const hoverDropdown = () => {

  // Get All Siblings
  const getSiblings = function (e) {
    // for collecting siblings
    const siblings = [];
    // if no parent, return no sibling
    if(!e.parentNode) {
        return siblings;
    }
    // first child of the parent node
    let sibling  = e.parentNode.firstChild;

    // collecting siblings
    while (sibling) {
        if (sibling.nodeType === 1 && sibling !== e) {
            siblings.push(sibling);
        }
        sibling = sibling.nextSibling;
    }
    return siblings;
  };

  // Close All Menus
  const hideAllMenus = () => {
    const openNavMenus = [].slice.call( document.querySelectorAll('.dropdown-hover .dropdown-menu.show') );
    const openNavLinks = [].slice.call( document.querySelectorAll('.dropdown-hover .dropdown-toggle[aria-expanded="true"]') );
    if (openNavMenus.length) {
      openNavMenus.forEach(menu => {
        menu.classList.remove('show');
      });
    }
    if (openNavLinks.length) {
      openNavLinks.forEach(link => {
        link.setAttribute('aria-expanded', 'false');
        link.classList.remove('show');
      });
    }
  };

  // Toggle dropdown menus
  const dropdowns = [].slice.call( document.getElementsByClassName('dropdown-hover') );
  if (dropdowns.length) {
    dropdowns.forEach(dropdown => {

      const links = [].slice.call( dropdown.getElementsByClassName('dropdown-toggle') );
      if (links !== null) {
        links.forEach(link => {
          const linkCaret = link.querySelector('.caret');
          const linkSiblings = getSiblings(link.parentNode);
          // const linkDropdown = link.parentElement;
          // const linkMenu = linkDropdown.querySelector('.dropdown-menu');
          // const linkOpenMenus = [].slice.call(linkDropdown.parentElement.getElementsByClassName('show'));
          // const linkOpenMenuToggles = linkDropdown.parentElement.querySelectorAll('.dropdown-toggle[aria-expanded="true"]');
          // const showMenu = () => {
          //   link.setAttribute('aria-expanded', 'true');
          //   link.classList.add('show');
          //   linkMenu.classList.add('show');
          // };
          // const hideMenu = () => {
          //   link.setAttribute('aria-expanded', 'false');
          //   link.classList.remove('show');
          //   linkMenu.classList.remove('show');
          // };
          // const toggleMenu = () => {
          //   if (linkMenu.classList.contains('show')) {
          //     // hideMenu();
          //     $(link).dropdown('hide');
          //   } else {
          //     // showMenu();
          //     // hideAllMenus();
          //     $(link).dropdown('show');
          //   }
          // };
          // const hideOpenMenus = () => {
          //   console.log(linkOpenMenus);
          //   if (linkOpenMenus.length) {
          //     linkOpenMenus.forEach(menu => {
          //       menu.classList.remove('show');
          //     });
          //   }
          // };
          const hideOpenMenus = () => {
            if (linkSiblings.length > 0) {
              linkSiblings.forEach(sibling => {
                const siblingLink = sibling.querySelector('.dropdown-toggle');
                $(siblingLink).dropdown('hide');
              });
            }
          };

          link.addEventListener('click', e => {
            // Stop clicks inside a dropdown menu from toggling dropdown
            e.stopPropagation();
            e.stopImmediatePropagation();
            hideOpenMenus();

            // Enable link
            const url = link.getAttribute('href');
            window.location = url;
          });

          if (linkCaret !== null) {
            linkCaret.addEventListener('click', e => {
              // Prevent caret from activating link
              e.preventDefault();
              e.stopImmediatePropagation();

              // Hide open menus
              hideOpenMenus();

              // Toggle dropdown when caret clicked
              // toggleMenu();
              // $(link).dropdown('toggle');
            });
          }

        });
      }

    });
  }

  // Close Menus on click outside
  const {body} = document;
  body.addEventListener('click', () => {
    hideAllMenus();
  });

  // Close Menus when window resized
  window.addEventListener('resize', () => {
    hideAllMenus();
  });
};

// const closeNav = () => {
//   const nav = $('#siteNav');
//
//   $('body').on('click', () => {
//     if ($(nav).hasClass('show')) {
//       $(nav).collapse('hide');
//     }
//   });
//
//   $(nav).on('click', e => {
//     e.stopPropagation();
//   });
// };

$(document).ready(() => {
  navEnable();
  // dropdownHover();
  hoverDropdown();
  // closeNav();
});

export default navEnable;
