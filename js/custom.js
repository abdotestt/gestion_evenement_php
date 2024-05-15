document.querySelector('#user-menu-button').addEventListener('click', function(event) {
    event.preventDefault();
    var target = document.querySelector('.drop');
    if (target.classList.contains('hidden')) {
      target.classList.remove('hidden');
    } else {
      target.classList.add('hidden');
    }
  });