<style>
    /* Font Family
    ================================================== */

    @import url("//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,300,400");

    /* Desktop
    ================================================== */

    .a { position:relative; margin:0 auto; width:700px; }
    .column { width:inherit; }

    /* Tablet (Portrait)
    ================================================== */

    @media only screen and (min-width: 768px) and (max-width: 959px) {
    .a { width:556px; }
    }

    /* Mobile (Portrait)
    ================================================== */

    @media only screen and (max-width: 767px) {
    .a { width:300px; }
    }

    /* Mobile (Landscape)
    ================================================== */

    @media only screen and (min-width: 480px) and (max-width: 767px) {
    .a { width:420px; }
    }

    * {
    -webkit-tap-highlight-color:rgba(0,0,0,0);
    -webkit-tap-highlight-color:transparent;
    }

    /* Misc.
    ================================================== */

    .add-bottom { margin-bottom:20px !important; }
    .left { float:left; }
    .right { float:right; }
    .center { text-align:center; }

    /* Custom Styles
    ================================================== */

    /* Highlight Styles */
    ::selection { background-color:#262223; color:#444; }


    /* Audio Player Styles
    ================================================== */

    /* Default / Desktop / Firefox */
    audio { margin:0 15px 0 14px; width:670px; }
    #mainwrap { box-shadow:0 0 6px 1px rgba(0,0,0,.25); }
    #audiowrap { background-color:#231F20; margin:0 auto; }
    #plwrap { margin:0 auto; }
    #tracks { position:relative; text-align:center; }
    #nowPlay { display:inline; }
    #npTitle { margin:0; padding:21px; text-align:right; }
    #npAction { padding:21px; position:absolute; }
    #plList { margin:0; }
    #plList li { background-color:#231F20; cursor:pointer; display:block; margin:0; padding:21px 0; }
    #plList li:hover { background-color:#262223; }
    .plItem { position:relative; }
    .plTitle { left:50px; overflow:hidden; position:absolute; right:65px; text-overflow:ellipsis; top:0; white-space:nowrap; }
    .plNum { padding-left:21px; width:25px; }
    .plLength { padding-left:21px; position:absolute; right:21px; top:0; }
    .plSel,.plSel:hover { background-color:#262223!important; cursor:default!important; }
    a[id^="btn"] { background-color:#231F20; color:#C8C7C8; cursor:pointer; display:inline-block; font-size:50px; margin:0; padding:21px 27px; text-decoration:none; }
    a[id^="btn"]:last-child { margin-left:-4px; }
    a[id^="btn"]:hover,a[id^="btn"]:active { background-color:#262223; }
    a[id^="btn"]::-moz-focus-inner { border:0; padding:0; }

    /* IE 9 */
    html[data-useragent*="MSIE 9.0"] audio { margin-left:9px; outline:none; width:680px; }
    html[data-useragent*="MSIE 9.0"] #audiowrap { background-color:#000; }
    html[data-useragent*="MSIE 9.0"] a[id^="btn"] { background-color:#000; }
    html[data-useragent*="MSIE 9.0"] a[id^="btn"]:hover { background-color:#080808; }
    html[data-useragent*="MSIE 9.0"] #plList li { background-color:#000; }
    html[data-useragent*="MSIE 9.0"] #plList li:hover { background-color:#080808; }
    html[data-useragent*="MSIE 9.0"] .plSel,
    html[data-useragent*="MSIE 9.0"] .plSel:hover { background-color:#080808!important; }

    /* IE 10 */
    html[data-useragent*="MSIE 10.0"] audio { margin-left:6px; width:687px; }
    html[data-useragent*="MSIE 10.0"] #audiowrap { background-color:#000; }
    html[data-useragent*="MSIE 10.0"] a[id^="btn"] { background-color:#000; }
    html[data-useragent*="MSIE 10.0"] a[id^="btn"]:hover { background-color:#080808; }
    html[data-useragent*="MSIE 10.0"] #plList li { background-color:#000; }
    html[data-useragent*="MSIE 10.0"] #plList li:hover { background-color:#080808; }
    html[data-useragent*="MSIE 10.0"] .plSel,
    html[data-useragent*="MSIE 10.0"] .plSel:hover { background-color:#080808!important; }

    /* IE 11 */
    html[data-useragent*="rv:11.0"] audio { margin-left:2px; width:695px; }
    html[data-useragent*="rv:11.0"] #audiowrap { background-color:#000; }
    html[data-useragent*="rv:11.0"] a[id^="btn"] { background-color:#000; }
    html[data-useragent*="rv:11.0"] a[id^="btn"]:hover { background-color:#080808; }
    html[data-useragent*="rv:11.0"] #plList li { background-color:#000; }
    html[data-useragent*="rv:11.0"] #plList li:hover { background-color:#080808; }
    html[data-useragent*="rv:11.0"] .plSel,
    html[data-useragent*="rv:11.0"] .plSel:hover { background-color:#080808!important; }

    /* All Apple Products */
    html[data-useragent*="Apple"] audio { margin:0; width:100%; }
    html[data-useragent*="Apple"] #audiowrap { background-color:#000; }
    html[data-useragent*="Apple"] a[id^="btn"] { background-color:#000; }
    html[data-useragent*="Apple"] a[id^="btn"]:hover { background-color:#080808; }
    html[data-useragent*="Apple"] #plList li { background-color:#000; }
    html[data-useragent*="Apple"] #plList li:hover { background-color:#080808; }
    html[data-useragent*="Apple"] .plSel,
    html[data-useragent*="Apple"] .plSel:hover { background-color:#080808!important; }

    /* IOS 7 */
    html[data-useragent*="OS 7"] audio { margin-left:3px; width:690px; }
    html[data-useragent*="OS 7"] #audiowrap { background-color:#e6e6e6; }
    html[data-useragent*="OS 7"] a[id^="btn"] { background-color:#e6e6e6; color:#373837; }
    html[data-useragent*="OS 7"] a[id^="btn"]:hover { background-color:#eee; }
    html[data-useragent*="OS 7"] #plList li { background-color:#e6e6e6; }
    html[data-useragent*="OS 7"] #plList li:hover { background-color:#eee; }
    html[data-useragent*="OS 7"] .plSel,
    html[data-useragent*="OS 7"] .plSel:hover { background-color:#eee!important; }

    /* IOS 8 */
    html[data-useragent*="OS 8"] audio { margin-left:6px; width:694px; }
    html[data-useragent*="OS 8"] #audiowrap { background-color:#e4e4e4; }
    html[data-useragent*="OS 8"] a[id^="btn"] { background-color:#e4e4e4; color:#373837; }
    html[data-useragent*="OS 8"] a[id^="btn"]:hover { background-color:#eee; }
    html[data-useragent*="OS 8"] #plList li { background-color:#e4e4e4; }
    html[data-useragent*="OS 8"] #plList li:hover { background-color:#eee; }
    html[data-useragent*="OS 8"] .plSel,
    html[data-useragent*="OS 8"] .plSel:hover { background-color:#eee!important; }

    /* IOS 9 */
    html[data-useragent*="OS 9"] audio { margin-left:6px; width:694px; }
    html[data-useragent*="OS 9"] #audiowrap { background-color:#d5d5d5; }
    html[data-useragent*="OS 9"] a[id^="btn"] { background-color:#d5d5d5; color:#373837; }
    html[data-useragent*="OS 9"] a[id^="btn"]:hover { background-color:#eee; }
    html[data-useragent*="OS 9"] #plList li { background-color:#d5d5d5; }
    html[data-useragent*="OS 9"] #plList li:hover { background-color:#eee; }
    html[data-useragent*="OS 9"] .plSel,
    html[data-useragent*="OS 9"] .plSel:hover { background-color:#eee!important; }

    /* Chrome */
    html[data-useragent*="Chrome"] audio { margin-left:9px; width:677px; }
    html[data-useragent*="Chrome"] #audiowrap { background-color:#fafafa; }
    html[data-useragent*="Chrome"] a[id^="btn"] { background-color:#fafafa; color:#5a5a5a; }
    html[data-useragent*="Chrome"] a[id^="btn"]:hover { background-color:#eee; }
    html[data-useragent*="Chrome"] #plList li { background-color:#fafafa; }
    html[data-useragent*="Chrome"] #plList li:hover { background-color:#eee; }
    html[data-useragent*="Chrome"] .plSel,
    html[data-useragent*="Chrome"] .plSel:hover { background-color:#eee!important; }

    /* Chrome / Android / Tablet */
    html[data-useragent*="Chrome"][data-useragent*="Android"] audio { margin-left:4px; width:689px; }
    html[data-useragent*="Chrome"][data-useragent*="Android"] #audiowrap { background-color:#fafafa; }
    html[data-useragent*="Chrome"][data-useragent*="Android"] a[id^="btn"] { background-color:#fafafa; color:#373837; }
    html[data-useragent*="Chrome"][data-useragent*="Android"] a[id^="btn"]:hover { background-color:#eee; }
    html[data-useragent*="Chrome"][data-useragent*="Android"] #plList li { background-color:#fafafa; }
    html[data-useragent*="Chrome"][data-useragent*="Android"] #plList li:hover { background-color:#eee; }
    html[data-useragent*="Chrome"][data-useragent*="Android"] .plSel,
    html[data-useragent*="Chrome"][data-useragent*="Android"] .plSel:hover { background-color:#eee!important; }

    /* Audio Player Media Queries
    ================================================== */

    /* Tablet Portrait */
    @media only screen and (min-width: 768px) and (max-width: 959px) {
    audio { width:526px; }
    html[data-useragent*="MSIE 9.0"] audio { width:536px; }
    html[data-useragent*="MSIE 10.0"] audio { width:543px; }
    html[data-useragent*="rv:11.0"] audio { width:551px; }
    html[data-useragent*="OS 7"] audio { width:546px; }
    html[data-useragent*="OS 8"] audio { width:550px; }
    html[data-useragent*="OS 9"] audio { width:550px; }
    html[data-useragent*="Chrome"] audio { width:533px; }
    html[data-useragent*="Chrome"][data-useragent*="Android"] audio { margin-left:4px; width:545px; }
    }

    /* Mobile Landscape */
    @media only screen and (min-width: 480px) and (max-width: 767px) {
    audio { width:390px; }
    html[data-useragent*="MSIE 9.0"] audio { width:400px; }
    html[data-useragent*="MSIE 10.0"] audio { width:407px; }
    html[data-useragent*="rv:11.0"] audio { width:415px; }
    html[data-useragent*="OS 7"] audio { width:410px; }
    html[data-useragent*="OS 8"] audio { width:414px; }
    html[data-useragent*="OS 9"] audio { width:414px; }
    html[data-useragent*="Chrome"] audio { width:397px; }
    html[data-useragent*="Chrome"][data-useragent*="Mobile"] audio { margin-left:4px; width:410px; }
    #npTitle { width:245px; }
    }

    /* Mobile Portrait */
    @media only screen and (max-width: 479px) {
    audio { width:270px; }
    html[data-useragent*="MSIE 9.0"] audio { width:280px; }
    html[data-useragent*="MSIE 10.0"] audio { width:287px; }
    html[data-useragent*="rv:11.0"] audio { width:295px; }
    html[data-useragent*="OS 7"] audio { width:290px; }
    html[data-useragent*="OS 8"] audio { width:294px; }
    html[data-useragent*="OS 9"] audio { width:294px; }
    html[data-useragent*="Chrome"] audio { width:277px; }
    html[data-useragent*="Chrome"][data-useragent*="Mobile"] audio { margin-left:4px; width:290px; }
    #npTitle { width:167px; }
    }

    .music{
    max-height : 300px;
    overflow-y:scroll;
    }
    .carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img {
        display:inline;
    }
</style>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->

<script type="text/javascript">
    // html5media enables <video> and <audio> tags in all major browsers
    // External File: http://api.html5media.info/1.1.8/html5media.min.js


    // Add user agent as an attribute on the <html> tag...
    // Inspiration: http://css-tricks.com/ie-10-specific-styles/
    var b = document.documentElement;
    b.setAttribute('data-useragent', navigator.userAgent);
    b.setAttribute('data-platform', navigator.platform);


    // HTML5 audio player + playlist controls...
    // Inspiration: http://jonhall.info/how_to/create_a_playlist_for_html5_audio
    // Mythium Archive: https://archive.org/details/mythium/
    jQuery(function ($) {
        var supportsAudio = !!document.createElement('audio').canPlayType;
        if (supportsAudio) {
            var index = 0,
                playing = false,
                mediaPath = 'audios/',
                extension = '',
                tracks = [
                <?php
                foreach($LesAudios as $audio)
                {
                    $pos = strripos($audio['lien'], "."); // retourne la position de la dernière occurrence '.'
                    $long = strlen ($audio['lien']); // longueur de la chaine
                    $p = $long - $pos;
                    $lien = substr($audio['lien'], 0 , - $p); //tronque avant le dernier '.'
                    ?>
                    {
                        "track": <?php echo $audio['id'] ?>,
                        "name": "<?php echo $audio['titre'] ?>",
                        "length": "03:46",
                        "file": "<?php echo $lien ?>"
                    },
                    <?php
                }?>
                ],
                trackCount = tracks.length,
                npAction = $('#npAction'),
                npTitle = $('#npTitle'),
                audio = $('#audio1').bind('play', function () {
                    playing = true;
                    npAction.text('Lecture...');
                }).bind('pause', function () {
                    playing = false;
                    npAction.text('Pause...');
                }).bind('ended', function () {
                    npAction.text('Pause...');
                    if ((index + 1) < trackCount) {
                        index++;
                        loadTrack(index);
                        audio.play();
                    } else {
                        audio.pause();
                        index = 0;
                        loadTrack(index);
                    }
                }).get(0),
                btnPrev = $('#btnPrev').click(function () {
                    if ((index - 1) > -1) {
                        index--;
                        loadTrack(index);
                        if (playing) {
                            audio.play();
                        }
                    } else {
                        audio.pause();
                        index = 0;
                        loadTrack(index);
                    }
                }),
                btnNext = $('#btnNext').click(function () {
                    if ((index + 1) < trackCount) {
                        index++;
                        loadTrack(index);
                        if (playing) {
                            audio.play();
                        }
                    } else {
                        audio.pause();
                        index = 0;
                        loadTrack(index);
                    }
                }),
                li = $('#plList li').click(function () {
                    var id = parseInt($(this).index());
                    if (id !== index) {
                        playTrack(id);
                    }
                }),
                loadTrack = function (id) {
                    $('.plSel').removeClass('plSel');
                    $('#plList li:eq(' + id + ')').addClass('plSel');
                    npTitle.text(tracks[id].name);
                    index = id;
                    audio.src = mediaPath + tracks[id].file + extension;
                },
                playTrack = function (id) {
                    loadTrack(id);
                    audio.play();
                };
            extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';
            loadTrack(index);
        }
    });
</script>

<div class="text-center">
    <?php
    if($app['couteauSuisse']->estConnecte())
    {
        ?>
        <div class="pull-right">
        <a href="ajouterAudio" title="Ajouter une ou des photos"><span class="glyphicon glyphicon-plus"></span></a>
        </div>
        <?php
    }
    ?>
    <h3>AUDIOS</h3>
</div>

<div id="audios" class="container text-center" style="padding:0;">

        <div class="column add-bottom">
            <div id="mainwrap">
                <div id="nowPlay">
                    <span class="left" id="npAction">Pause...</span>
                    <span class="right" id="npTitle"></span>
                </div>
                <div id="audiowrap">
                    <div id="audio0">
                        <audio preload id="audio1" controls="controls">Votre navigateur ne supporte pas HTML5 Audio!</audio>
                    </div>
                    <div id="tracks">
                        <a id="btnPrev">&laquo;</a>
                        <a id="btnNext">&raquo;</a>
                    </div>
                </div>
                <div id="plwrap">
                    <ul class="music" id="plList" style="padding:0">
                        <?php
                        foreach($LesAudios as $audio)
                        {
                            ?>
                            <li>
                                <div class="plItem">
                                    <div class="plNum"><?php echo $audio['id'] ?>.</div>
                                    <div class="plTitle"><?php echo $audio['titre'] ?></div>
                                    <div class="plLength">3:46</div>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>