AOS.init();

jQuery(document).ready(function($) {
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
        filteredPosts.html('<p>Loading...</p>');
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
});

