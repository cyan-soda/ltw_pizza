<div class="page-wrapper">
    
    <?php 
      require_once "./app/views/" . $data["header"] . ".php";
    ?>

    <main class="page-main">
        <div class="container">
          <h1>hehe</h1> <br>
          <h1>hehe</h1> <br>
          <h1>hehe</h1> <br>
          <h1>hehe</h1> <br>
          <h1>hehe</h1> <br>
          <h1>hehe</h1> <br>
          <h1>hehe</h1> <br>
          <h1>hehe</h1> <br>
          <h1>hehe</h1> <br>
        </div>
    </main>

    <?php 
      require_once "./app/views/" . $data["footer"] . ".php";
    ?>

</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var header = document.querySelector('.page-header');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 0) {
            header.classList.add('sticky-header');
        } else {
            header.classList.remove('sticky-header');
        }
    });
});
</script>

