<?php
/**
 * The footer for Bolton & Quinn, including analytics
 *
 * @subpackage Bolton Quinn
 * @since Bolton Quinn v. 1.0.0
 */
?>
  <footer>
    <p>&copy; 2014 Bolton &amp; Quinn LTD. <span>Company registered in England and Wales number 01790723.</span></p>
  </footer>
  
  <script src="<?php echo get_template_directory_uri(); ?>/bq.js"></script>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-50054011-1', 'boltonquinn.com');
    ga('send', 'pageview');
  </script>
</body>
</html>