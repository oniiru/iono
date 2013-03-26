function openWindow(link) {
      _gaq.push(function() {
        var tracker = _gat._getTrackerByName();  //add name param if needed
		if(link.target=="_blank"){
			window.open(tracker._getLinkerUrl(link.href));
		}else{
			window.location = tracker._getLinkerUrl(link.href);
		}
      });
      return false;
    }

$(document).ready(function(){
		// Creating custom :external selector
		$.expr[':'].external = function(obj){
			return !obj.href.match(/^mailto\:/) && !obj.href.match(/^javascript\:/) && (obj.hostname != location.hostname);
		};
		
		// Add 'external' CSS class to all external links
		$('a:external').addClass('external');
		$('a:external').click(function(){
			return openWindow(this);
		});
		
		$("form").submit(function(){
			if(this.action.match(location.hostname)!=null && this.action.match(/^http|https\:/)){
				_gaq.push(['_linkByPost', this]);
			}
		});
	});