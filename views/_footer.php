<nav>
    <ul>
        <li>Infos légales</li>
        <li>Qui sommes-nous ?</li>
        <li><a href="index.php?page=contact">Contact</a></li>
        <li><a id='contact' href="#">Contact ajax</a></li>
    </ul>
</nav>
<script>
    $('#contact').click(function () {

        $.ajax({
            async: true,
            type: 'POST',
            url: "ajax.php",
            data: 'action=contact',
            error: function (dataerror) {
                alert(dataerror);
            },
            success: function (data) {

                $('#mondiv').html(data);
            },
        });
    });
</script>