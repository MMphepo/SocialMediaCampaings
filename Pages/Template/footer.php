
<footer>
    <div class="ft-top">
        <div class="ft-t-left">
            <div>
                SUBSCRIBE TO OUR
            </div>
            <div>
                NEWSLETTER
            </div>
        </div>
        <div class="ft-t-right">
            <div>
                <input form="newsletter" type="email" name="email" id="email">
                <input form="newsletter" type="submit" value="submit">
            </div>


        </div>
    </div>
    <div class="ft-bottom">
        <div class="ft-b-left">
            <h1>SMC</h1>
            <p>Social Media Campaigns</p>
        </div>
        <div class="ft-b-center">
            <div class="youhere">
                You are on the <span id="pagelocate"></span>
            </div>
            <div>follow us on the links below:</div>
            <div class="socialmedia">
                <a href="#"><img src="../media/twitter.png" alt=""></a>
                <a href=""><img src="../media/IG.png" alt=""></a>
                <a href="#"><img src="../media/twitterblck.png" alt=""></a>
            </div>
        </div>
        <div> SMC @2024. <br> All right reseved. &copy Copyright </div>
    </div>
</footer>
<script>
    const pageTitle = document.title;
    const output = document.getElementById('pagelocate');
    output.innerHTML = pageTitle;
</script>








