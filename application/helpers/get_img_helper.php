<?php
function get_mtg_img($multiverseid,$class = '') {
	return "<img src='http://mtgimage.com/multiverseid/${multiverseid}.jpg' class='${class}'>";
}