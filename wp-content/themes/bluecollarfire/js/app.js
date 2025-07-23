

/**
 * Blog Filtering AJAX
 */
jQuery(document).ready(function($) {
  AOS.init();

  const filteredPosts = $('#filtered-posts');
  const categoryForm = $('#blog-filter');
  const searchInput = $('#search-input');
  let timeout = null;

  function fetchFilteredPosts() {
    const selectedCategory = categoryForm.find('input[name="category"]:checked').val() || '';
    const searchTerm = searchInput.val().trim();

    $.ajax({
      url: blogfilter.ajax_url,
      type: 'POST',
      data: {
        action: 'filter_blog_posts',
        category: selectedCategory,
        search: searchTerm,
      },
      beforeSend: function() {
        filteredPosts.html(`
          <div class="spinner absolute top-[8rem] left-[50%]">
            <svg class=" w-[2.5rem] h-[2.5rem] animate-spin h-8 w-8 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
            </svg>
          </div>
        `);

      },
      success: function(response) {
        filteredPosts.html(response);
      },
      error: function() {
        filteredPosts.html('<p>There was an error loading posts.</p>');
      }
    });
  }

  // When category changes, clear search input and fetch posts
  categoryForm.on('change', 'input[name="category"]', function() {
    searchInput.val('');  // Clear search input
    fetchFilteredPosts();
  });

  // Trigger on search input with debounce
  searchInput.on('input', function() {
    clearTimeout(timeout);
    timeout = setTimeout(fetchFilteredPosts, 300);
  });



  /**
   * Return to top
   */
    const $backToTop = $('#backToTop');

    $(window).scroll(function () {
      if ($(this).scrollTop() > 300) {
        $backToTop.removeClass('hidden');
      } else {
        $backToTop.addClass('hidden');
      }
    });
  
    $backToTop.on('click', function () {
      $('html, body').animate({ scrollTop: 0 }, 600); // 600ms smooth scroll
    });


    /**
     * Hamburger Nav
     */
    $('#nav-toggle').on('click', function() {
      $('#primary-menu').toggleClass('translate-x-full active');
      $('#nav-toggle i').toggleClass('fa-bars fa-times');
      $('#nav-toggle').toggleClass('active');
    });
});

