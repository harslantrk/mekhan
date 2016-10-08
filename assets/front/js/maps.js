function CustomMarker(latlng, map, args, hide) {
	this.latlng = latlng;	
	this.args = args;	
	this.titleHide = hide;
	this.setMap(map);	
}

CustomMarker.prototype = new google.maps.OverlayView();

CustomMarker.prototype.draw = function() {
	var self = this;
	var div = this.div;
	var template = "";

	if (!div) {
		div = this.div = document.createElement('div');
		div.className = 'maps-marker marker-' + self.args.pk;

		if (typeof(self.args.marker_id) !== 'undefined') {
			div.dataset.marker_id = self.args.marker_id;
		}
		google.maps.event.addDomListener(div, "click", function(event) {	
			google.maps.event.trigger(self, "click");
			console.log(self.args);
		});
		if (this.titleHide !== true) {
			template += "<div class=\"marker-title\">";
			template += "<span>" + self.args.title + "</span>";
			template += "</div>";
		}
		template += "<div class=\"marker-icon\">";
		template += "<img src=\""+ self.args.icon +"\" />";
		template += "</div>";
		div.innerHTML = template;
		var panes = this.getPanes();
		panes.overlayImage.appendChild(div);
	}
	var point = this.getProjection().fromLatLngToDivPixel(this.latlng);
	if (point) {
		div.style.left = (point.x - 10) + 'px';
		div.style.top = (point.y - 20) + 'px';
	}
};

CustomMarker.prototype.remove = function() {
	if (this.div) {
		this.div.parentNode.removeChild(this.div);
		this.div = null;
	}	
};

CustomMarker.prototype.getPosition = function() {
	return this.latlng;	
};