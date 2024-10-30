document.getElementById('toggle-btn').addEventListener('click', function() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('collapsed');
  });

  function toggleButton(button, activeClass) {
    // Remove existing active classes
    button.classList.remove('btn-outline-primary', 'btn-outline-warning', 'btn-outline-danger');
    
    // Check if the button already has the active class
    if (button.classList.contains(activeClass)) {
      // If it does, remove the active style, reverting to the outline style
      button.classList.remove(activeClass);
      button.classList.add(`btn-outline-${activeClass.split('-')[1]}`);
    } else {
      // Otherwise, add the active style
      button.classList.add(activeClass);
    }
  }