<style>
    /* footer */
    footer > div{
        display: flex;
        justify-content: space-around;
        color: #fff !important;
        background-color: #304148;
        padding: 100px 0;
    }
    @media(max-width: 700px){
        footer > div{
            flex-direction: column;
            justify-content: center !important;
            align-items: center;
        }
        .e{
            margin-bottom: 30px;
            width: 300px !important;
        }
    }
    .l li{
        list-style: none;
    }
    .l a {
        text-decoration: none;
        color: #fff
    }
</style>

<footer>
    <hr style="margin-top: 100px">
    <br>
    <div>
        <div class="e">
            <h4>Localização</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!4v1655920634782!6m8!1m7!1sWZ8-HtbHSGnDgDLl5WH-DA!2m2!1d-21.20553403444856!2d-41.88860653470199!3f166.12789533956075!4f-2.5129439090553234!5f0.7820865974627469" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <h6>Subindo a escada para o salão de beleza charmosa.</h6>
        </div>

        <ul class="l e">
            <h4><li>Menu</li></h4>
            <a href="#paginaprincipal"><li>Página principal</li></a>
            <a href="#paginaprincipal"><li>Loja</li></a>
            <a href="#paginaprincipal"><li>Contato</li></a>
        </ul>

        <div class="e">
            <ul class="l">
                <h4><li>Contato</li></h4>
                <li>Email: danijeansmodas@gmail.com</li>
                <li>Cel: (22) 99832-1545</li>
            </ul>
        </div>
    </div>
    <div style="padding: 10px 0 !important">
        <h6>&copy; José Henrirque - Jônatas M. Campos, <?php echo date("Y") ?></h6>
    </div>
</footer>