<header class = 'header'>
    <h1>Playful Plants</h1>
    <div class = "nav">
      <nav>
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/admin">Admin</a></li>
        </ul>
      </nav>
    </div>
    <!-- <a href="/">Log out</a> -->
    <img src="/public/images/kids-outdoors.png" alt="children outdoors">

    <?php if(is_user_logged_in()){ ?>
      <p id="logout"><a href = <?php echo logout_url(); ?>>Log out</a></p>
    <?php }?>
  </header>
