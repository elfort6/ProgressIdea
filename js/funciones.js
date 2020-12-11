function verProyecto(id) {
    window.location.assign(`./visualizarProyectoInfo.php?id=${id}`);
}

$('#star1').hover(
    function(){ $('#star1').css('color', '#EADD18') },
    function(){ $('#star1').css('color', '#000') });

$('#star2').hover(
    function(){ $('#star1').css('color', '#EADD18');$('#star2').css('color', '#EADD18');},
        function(){ $('#star1').css('color', '#000');  $('#star2').css('color', '#000')});
        
        $('#star3').hover(
            function(){ $('#star1').css('color', '#EADD18');$('#star2').css('color', '#EADD18');$('#star3').css('color', '#EADD18');},
                function(){ $('#star1').css('color', '#000');  $('#star2').css('color', '#000'); $('#star3').css('color', '#000')});
                
                $('#star4').hover(
                    function(){ $('#star1').css('color', '#EADD18');$('#star2').css('color', '#EADD18');$('#star3').css('color', '#EADD18');$('#star4').css('color', '#EADD18');},
                        function(){ $('#star1').css('color', '#000');  $('#star2').css('color', '#000'); $('#star3').css('color', '#000');$('#star4').css('color', '#000')});
                        
                        $('#star5').hover(
                            function(){ $('#star1').css('color', '#EADD18');$('#star2').css('color', '#EADD18');$('#star3').css('color', '#EADD18');$('#star4').css('color', '#EADD18');$('#star5').css('color', '#EADD18');},
                                function(){ $('#star1').css('color', '#000');  $('#star2').css('color', '#000'); $('#star3').css('color', '#000');$('#star4').css('color', '#000');$('#star5').css('color', '#000')});

    

