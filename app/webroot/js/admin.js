var server="/tecnocenter/";
var sendData=function(order,controller){
		var data={};
		for(i=0;i<order.length;i+=1){
			data["data[Item]["+order[i]+"]"]=(i+1);
		}
		$.post(server+controller+"/reOrder",
				data,
				function(response){
					if(response=="yes"){
						for(i=0;i<order.length;i+=1){
							$("tr#"+order[i]).children(".order").text(i+1);
						}
					}
				}
		);
		
		}
	$(function() {
			$( "#sortable tbody" ).sortable({
			revert: true,
			items:"tr:not(.ui-state-disabled)",
			update:function(event, ui){
		
			sendData($(this).sortable("toArray"),$("table").attr("controller"));
			
			
			}
				
		});

		$( "#sortable tbody > tr" ).disableSelection();

	});

