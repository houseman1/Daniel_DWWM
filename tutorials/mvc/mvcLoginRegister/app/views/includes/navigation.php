<nav id="nav" class="top-nav" id="topNav"></nav>
    <ul>
        <li>
            <!-- Using URLROOT, we don't need to change every single URL whenever we upload our
            website to a server, we only need to change it in 'config.php'
            En utilisant URLROOT, nous n'avons pas besoin de changer chaque URL chaque fois que nous téléchargeons notre
            site web vers un serveur, il suffit de le changer dans 'config.php' -->
            <a href="<?php echo URLROOT; ?>/app/views/pages/index">Home</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/about">About</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/projects">Projects</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/blog">Blog</a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/pages/contact">Contact</a>
        </li>
        <li class="btn-login">
            <a href="<?php echo URLROOT; ?>/users/login">Login</a>
        </li>
    </ul>
<?php echo URLROOT; ?>