$(function() {
	$(document).ready(function(){
		api = $("#my-menu").mmenu({
		    navbar:{
		        title: 'title'
		    },
		    offCanvas: {
		    	position: 'right'
		    }
		},{clone: true}).data( "mmenu" )
		
		api.bind( "open:start", function( e ) {
		    $('#my-menu-button').addClass('is-active')
		});
		api.bind( "close:start", function( e ) {
		    $('#my-menu-button').removeClass('is-active')
		});
	})
	// OK.CONNECT.insertGroupWidget("ok_group_widget","50582132228315",'{"width":200,"height":230}')
	// VK.Widgets.Group("vk_groups", {mode: 3, width: "195"}, 20003922);
});
