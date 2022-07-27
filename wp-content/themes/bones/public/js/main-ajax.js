jQuery(document).ready(function ($) {

    $('#loadmore').click(function() {
      $.ajax({
        url: loadmore_params.ajaxurl,
        data: {
          'action': 'loadmorebutton',
          'query': loadmore_params.posts,
          'page': loadmore_params.current_page
        },
        type: 'POST',
        beforeSend : function( xhr ) {
          $('#loadmore').text('Carregando...');
        },
        success : function( posts ) {
          if( posts ) {
            $('#loadmore').text( 'Carregar mais' );
            $('.exemplo__container').append( posts );
            loadmore_params.current_page++;
  
            if( loadmore_params.current_page == loadmore_params.max_page )
              $('#loadmore').hide();
          
          } else {
            $('#loadmore').hide();
          }
        }
      });
      return false;
    });
  
    $('#filter').submit(function() {
      $.ajax({
        url: loadmore_params.ajaxurl,
        data: $('#filter').serialize(),
        dataType: 'json',
        type: 'POST',
        beforeSend : function( xhr ) {
          $('#filter').find('button').text('Filtrando...');
        },
        success : function( data ) {
          loadmore_params.current_page = 1;
          loadmore_params.posts = data.posts;
          loadmore_params.max_page = data.max_page;
          
          $('#filter').find('button').text('Filtrar');
          $('.exemplo__container').html(data.content);
  
          if ( data.max_page < 2 ) {
            $('#loadmore').hide();
          } else {
            $('#loadmore').show();
          }
        }
      });
      return false;
    });
  
  })