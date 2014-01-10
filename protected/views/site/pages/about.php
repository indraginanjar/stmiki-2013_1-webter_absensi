<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<div id="ContentWrap" >
    <form class="box" id="about" action="javascript:window.location='.'">
        <div id="FormHeader">
            <h2>About</h2>
        </div>
         <fieldset>
            <p>
                Tugas kelompok matakuliah Web Terapan jelang ujian tengah semester tahun akademik 20131.
            </p>
            <h4>Anggota Kelompok IV : </h4>
            <div id="accordion">
                <h3>Indra Ginanjar (101100180)</h3>
                <div class="list-profil">
                    <div class="image-wrap">
                        <a href="http://gembira-ah.blogspot.com" target="_blank">
                            <img src="res/img/indraginanjar.jpg" width="70" height="100">
                        </a>
                        <p>

                        </p>
                    </div>
                    <div clas="text-wrap">

                    </div>

                </div>
                <h3>Sugiarto (101100173)</h3>
                <div class="list-profil">
                    <div class="image-wrap">
                        <a href="http://sugiarto.web.id" target="_blank">
                            <img src="res/img/sugiarto.jpg" width="70" height="100">
                        </a>
                    </div>
                    <div clas="text-wrap">
                        <p>
                            Membuat kode program itu tidak susah, yang susah itu membaca kode program orang lain.
                        </p>
                    </div>

                </div>
                <h3>Adriyanto (101100199)</h3>
                <div class="list-profil">
                    <div class="image-wrap">
                        <a href="http://adriyan.web.id" target="_blank">
                            <img src="res/img/adriyanto.jpg" width="70" height="100">
                        </a>
                    </div>
                    <div clas="text-wrap">
                        <p>
                            Kekuatan Pikiran, Disertai Perbuatan Akan menjadi Kenyataan...!!!
                        </p>
                    </div>

                </div>
                <h3>Zoel Fadli (101100174)</h3>
                <div class="list-profil">
                    <div class="image-wrap">
                        <a href="http://rangpiliang.web.id" target="_blank">
                            <img src="res/img/zoelfadli.jpg" width="70" height="100">
                        </a>
                    </div>
                    <div clas="text-wrap">
                        <p>
                            Ilmu itu adalah perhiasan yang paling menawan dan tiada tandinganya bagi orang yang
                            benar-benar yang ikhlas mencarinya.
                        </p>
                    </div>

                </div>
                <h3>Nansar (111100064)</h3>
                <div class="list-profil">
                    <div class="image-wrap">
                        <a href="http://facebook.com/nansar.tanjung" target="_blank">
                            <img src="res/img/putratanjung.jpg" width="70" height="100">
                        </a>
                    </div>
                    <div clas="text-wrap">
                        <p>
                            
                        </p>
                    </div>

                </div>
            </div>

        </fieldset>
        <footer>
            <input type="submit" value="Ok">
        </footer>
    </form>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/res/js/common.js"></script>

