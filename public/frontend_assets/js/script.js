//  IIFE (Immediately Invoked Function Expression) so that the variables and functions inside them do not interfere with the global scope.

(function() { // nav shadow function
  window.addEventListener("scroll", function() {
    const [red, green, blue] = [242, 254, 255];
    const nav = document.querySelector("nav");
  
    const y = 1 + (window.scrollY || window.pageYOffset) / 200;
    const [r, g, b] = [red / y, green / y, blue / y].map(Math.ceil);
    nav.style.boxShadow = `0 0 4px rgb(${r}, ${g}, ${b})`;
  });
})();

// Retracts Create Post button tooltip
// (function() {
//   window.addEventListener("DOMContentLoaded", function() {
//     setTimeout(function() {
//       let tooltip = document.getElementById('createPostTooltip');
//       tooltip.classList.add('hide');
//     }, 3000);
//   });
// })();

const autoResizeTextarea = () => {
  const textareas = document.querySelectorAll("#expandable-textarea"); // Post comments
  const postBtnWrappers = document.querySelectorAll(".postBtnWrapper");

  textareas.forEach((textarea, index) => {
    textarea.addEventListener("input", () => {
      if (textarea.scrollHeight <= 70) {
        textarea.style.height = "20px";
        textarea.style.height = textarea.scrollHeight + "px";
      } else {
        textarea.style.height = "70px";
      }

      const postBtnWrapper = postBtnWrappers[index];
      if (textarea.value) {
        postBtnWrapper.style.color = "#eb253f";
        postBtnWrapper.style.backgroundColor = "red";
      } else {
        postBtnWrapper.style.color = "#4fe3b7c4";
        postBtnWrapper.style.backgroundColor = "transparent";
      }
    });
  });
}


// Header nav profile dropdown
const revealProfileDropdown = () => {
  // Get the dropdown element
  let dropdown = document.querySelector("#profileDropdown");

  // Toggle the "display" style of the dropdown element
  if (dropdown.style.display === "block") {
    dropdown.style.display = "none";
  } else {
    dropdown.style.display = "block";
  }

  // Add a click event listener to the document to hide dropdown when any element on the page is clicked
  document.addEventListener("click", function (event) {
    // Get the dropdown element
    let dropdown = document.querySelector("#profileDropdown");
  
    // Check if the target of the click event is not the dropdown or a descendant of the dropdown
    if (!event.target.closest(".profile")) {
      // If the target is not the dropdown or a descendant of the dropdown, hide the dropdown
      dropdown.style.display = "none";
    }
  });
}

const replaceLikeIcon = (icon) => { 
  if (icon.classList.contains('bi-heart')) {
    icon.classList.remove('bi-heart');
    icon.classList.add('bi-heart-fill');
    icon.style.color = 'red';
  } else {
    icon.classList.remove('bi-heart-fill');
    icon.classList.add('bi-heart');
    icon.style.color = 'initial';
  }
}

const toggleSearchDropdown = () => {
  const searchDropDown = document.querySelector('.searchDropDown');
  const searchIcon = document.querySelector('.searchIcon');
  const searchField = document.querySelector('input[name="search"]');

  if (searchIcon.classList.contains('bi-search')) {
    searchDropDown.style.display = "block";
    searchIcon.classList.remove('bi-search');
    searchIcon.classList.add('bi-x-lg');
    searchField.focus();
  } else {
    searchDropDown.style.display = "none";
    searchIcon.classList.remove('bi-x-lg');
    searchIcon.classList.add('bi-search');
  }
}

const hideSuccessMessage = () => {
  document.getElementById("hideSuccessMessage").style.display = "none";
}

let blackModalBackground = document.getElementById('blackModalBackground');

const openPostModal = () => {
  document.getElementById('postModal').style.display = 'block';
  blackModalBackground.style.display = 'block';
}

const openEditModal = () => {
  document.getElementById('editModal').style.display = 'block';
  blackModalBackground.style.display = 'block';
}

const closePostModal = () => {
  document.getElementById('postModal').style.display = 'none';
  blackModalBackground.style.display = 'none';
}

const closeEditModal = () => {
  document.getElementById('editModal').style.display = 'none';
  blackModalBackground.style.display = 'none';
}

// Admin modals
const openAddCategoryModal = () => {
  document.getElementById('addCategoryModal').style.display = 'block';
  blackModalBackground.style.display = 'block';
}

const closeAddCategoryModal = () => {
  document.getElementById('addCategoryModal').style.display = 'none';
  blackModalBackground.style.display = 'none';
}

const openEditCategoryModal = () => {
  document.getElementById('editCategoryModal').style.display = 'block';
  blackModalBackground.style.display = 'block';
}

const closeEditCategoryModal = () => {
  document.getElementById('editCategoryModal').style.display = 'none';
  blackModalBackground.style.display = 'none';
}

// Controls logout and login toggle icon on admin sidebar
function toggleIconAndText(iconId, buttonEl) {
  const icon = document.getElementById(iconId);
  icon.classList.toggle('bi-toggle-on');
  icon.classList.toggle('bi-toggle-off');
  
  const buttonText = buttonEl.textContent.trim();
  if (buttonText === 'Logout') {
    buttonEl.textContent = 'Login';
  } else {
    buttonEl.textContent = 'Logout';
  }
}

const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
  toastTrigger.addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastLiveExample)

    toast.show()
  })
}