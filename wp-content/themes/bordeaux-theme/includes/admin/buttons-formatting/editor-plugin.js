/**
 * This file contains all the main JavaScript functionality needed for the editor formatting buttons.
 * 
 * @author orangethemes
 * http://orangethemes.com
 */

/**
 * Define all the formatting buttons with the HTML code they set.
 */
var orangethemesButtons=[
		{
			id:'orangethemesbutton',
			image:'btn-button.png',
			title:'Button',
			allowSelection:false,
			fields:[{id:'size', name:'Size', values:['Large', 'Small']},{id:'text', name:'Text'},{id:'icon', name:'Icon', values:ot_icons()},{id:'href', name:'Link URL'},{id:'color', name:'Color', value:'b70900', colorpalette:true},{id:'textcolor', name:'Text Color', colorpalette:true},{id:'target', name:'Target', values:['Self', 'Blank']}],
			generateHtml:function(obj){
				var code = obj.icon;
				var buttonTarget=obj.target==='Self'?'':'blank';
				return '[button link="'+obj.href+'" icon="'+code+'" size="'+obj.size.toLowerCase()+'" target="'+buttonTarget+'" color="'+obj.color.toLowerCase()+'" textcolor="'+obj.textcolor.toLowerCase()+'"]'+obj.text+'[/button]';

			}
		},
		{
			id:'orangethemesaccordion',
			image:'btn-accordion.png',
			title:'Accordion Boxes',
			allowSelection:false,
			fields:[{id:'title-1', name:'Title: '},{id:'text', name:'Text: ', toggles:true}],
			generateHtml:function(obj){
				var x = jQuery('#ot-toggles').val();  
				var output = '[accordion]';
				for(e = 1; e <= x; e++) {
					output+= '[acc ';
					output+= 'title="'+jQuery('#orangethemes-shortcode-title-'+e).val()+'"]';
					output+= jQuery('#orangethemes-shortcode-text-'+e).val();
					output+= '[/acc]';
				}
				output+="[/accordion]";

				return output;
			}
		},
		{
			id:'orangethemestoggles',
			image:'btn-toggles.png',
			title:'Toggles',
			allowSelection:false,
			fields:[{id:'title', name:'Title: '},{id:'text', name:'Text: ', textarea:true}],
			generateHtml:function(obj){ 
				return '[toggles title="'+obj.title+'"]'+obj.text+'[/toggles]';
			}
		},
		{
			id:'orangethemesteam',
			image:'btn-team-single.png',
			title:'Team Single',
			allowSelection:false,
			fields:[{id:'title', name:'Title: '},{id:'subtitle', name:'Subtitle: '},{id:'text', name:'Text: ', textarea:true},{id:'url', name:'Author Url: '}, {id:'image', name:'Image Url: ', upload:true} ],
			generateHtml:function(obj){ 
				return '[team title="'+obj.title+'" subtitle="'+obj.subtitle+'" url="'+obj.url+'" image="'+obj.image+'"]'+obj.text+'[/team]';
			}
		},
		{
			id:'orangethemesteam2',
			image:'btn-team-double.png',
			title:'Team Double',
			allowSelection:false,
			fields:[{id:'title', name:'Title 1: '},{id:'subtitle', name:'Subtitle 1: '},{id:'text', name:'Text 1: ', textarea:true},{id:'url', name:'Author Url 1: '}, {id:'image', name:'Image Url 1: ', upload:true}, {id:'title2', name:'Title 2: '},{id:'subtitle2', name:'Subtitle 2: '},{id:'text2', name:'Text 2: ', textarea:true},{id:'url2', name:'Author Url 2: '}, {id:'image2', name:'Image Url 2: ', upload:true} ],
			generateHtml:function(obj){ 
				return '[team-2 title="'+obj.title+'" subtitle="'+obj.subtitle+'" url="'+obj.url+'" image="'+obj.image+'" text="'+obj.text+'" title2="'+obj.title2+'" subtitle2="'+obj.subtitle2+'" url2="'+obj.url2+'" image2="'+obj.image2+'" text2="'+obj.text2+'"]';
			}
		},
		{
			id:'orangethemesmarker',
			image:'cpanel-btn-marker.png',
			title:'Text Marker',
			allowSelection:true,
			fields:[{id:'markercolor', name:'Color', color:"c24000", colorpalette:true, selesction:true}],
			generateHtml:function(obj){
				return '[textmarker color="'+obj.markercolor+'"]'+obj.selection+'[/textmarker]';
			}

		},
		{
			id:'orangethemestables',
			image:'btn-table-shortcode.png',
			title:'Create Table',
			allowSelection:false,
			fields:[{id:'table_row', name:'Rows Count'},{id:'table_columns', name:'Columns Count'}],
			generateHtml:function(obj){
				var $rows = obj.table_row;
				var $colomns = obj.table_columns;
				var $table = "<table class=\"table-bordered\">";
				$table += "<thead><tr>";
				for($i=1; $i<=$colomns; $i++) {

					$table += "<th>Main Header "+$i+"</th>";

				}
				$table += "</tr></thead>";
				$table += "<tbody>";

				for($i=1; $i<=$rows; $i++) {
					$table += "<tr>";
					for($ii=1; $ii<=$colomns; $ii++) {

						$table += "<td>Text "+$ii+"</td>";

					}
					$table += "</tr>";
				}

				$table += "</tbody>";
				$table += "</table>";

				return $table;

			}

		},		
		{
			id:'orangethemesspacer',
			image:'btn-spacer.png',
			title:'Spacer',
			allowSelection:false,
			fields:[{id:'style', name:'Style', values:['Spacer 1', 'Spacer 2', 'Spacer 3', 'Spacer 4', 'Spacer 5', 'Spacer 6', 'Spacer 7']},{id:'color', name:'Color (Spacer 6 and Spacer 7*)', value:'b70900', colorpalette:true, disabled:true}],
			generateHtml:function(obj){

				switch(obj.style)
				{
					case 'Spacer 1':
					 	var spacerStyle='1';
					  	break;
					case 'Spacer 2':
					 	var spacerStyle='2';
						break;
					case 'Spacer 3':
					 	var spacerStyle='3';
						break;
					case 'Spacer 4':
					 	var spacerStyle='4';
						break;
					case 'Spacer 5':
					 	var spacerStyle='5';
						break;
					case 'Spacer 6':
					 	var spacerStyle='6';
						break;
					case 'Spacer 7':
					 	var spacerStyle='7';
						break;
					default:
					 	var spacerStyle='1';
					    break;
				}

				return '[spacer color="'+obj.color+'" style="'+spacerStyle+'"]';

			}
		},
		{
			id:'orangethemesvideo',
			image:'cpanel-btn-video.png',
			title:'Insert Video',
			allowSelection:false,
			fields:[{id:'type', name:'Type', values:['Youtube', 'Vimeo']},{id:'links', name:'Video Link' }],
			generateHtml:function(obj){
				return '[ot-video type="'+obj.type.toLowerCase()+'" url="'+obj.links+'"]';
			}
		},
		{
			id:'orangethemesquote',
			image:'btn-quotes.png',
			title:'Quote',
			allowSelection:false,
			fields:[{id:'style', name:'Style', values:['Style-1', 'Style-2', 'Style-3']},{id:'quotetext', name:'Quote text', textarea:true}],
			generateHtml:function(obj){

				switch(obj.style.toLowerCase()) {
					case 'style-1':
						var style='1'
						break;
					case 'style-2':
						var style='2'
						break;
					case 'style-3':
						var style='3'
						break;
					default:
						var style='1'
						break;

				}
				if(obj.style.toLowerCase()=="default"){
					return '[blockquote]'+obj.quotetext+'[/blockquote]';
				} else {
					return '[blockquote style="'+style+'"]'+obj.quotetext+'[/blockquote]';
				}
				

			}
		},
		{
			id:'orangethemesingredients',
			image:'btn-ingredients.png',
			title:'Ingredients',
			allowSelection:false,
			fields:[{id:'ingredients', name:'Ingredients, separate each with ";"', textarea:true}],
			generateHtml:function(obj){
				return '[ingredients_wrap]'+obj.ingredients+'[/ingredients_wrap]';
			}
		},
		{
			id:'orangethemesdirections',
			image:'btn-directions.png',
			title:'Directions',
			allowSelection:false,
			fields:[{id:'directions', name:'Directions, separate each with ";"', textarea:true}],
			generateHtml:function(obj){
				return '[directions_wrap]'+obj.directions+'[/directions_wrap]';
			}
		},
		{
			id:'orangethemespricing',
			image:'btn-pricing.png',
			title:'Pricing Table',
			allowSelection:false,
			fields:[{id:'table', name:'First Table In The Post:', values:['Yes', 'No']},{id:'active', name:'Active?', values:['No', 'Yes']},{id:'color', name:'Color', colorpalette:true},{id:'title', name:'Title'},{id:'price', name:'Price'},{id:'currency', name:'Currency'},{id:'period', name:'Period'},{id:'list', name:'Features, separate them with - ;', textarea:true},{id:'btntext', name:'Button Text'},{id:'href', name:'Button Link'},{id:'target', name:'Button Target', values:['Self', 'Blank']}],
			generateHtml:function(obj){
				var output = '';

				if(obj.table=="Yes") {
					output+="[wraper]";
				}

					output+='[pricing title="'+obj.title+'" color="'+obj.color+'" price="'+obj.price+'" currency="'+obj.currency+'" period="'+obj.period+'" list="'+obj.list+'" btntext="'+obj.btntext+'" url="'+obj.href+'" target="'+obj.target+'"]';
				if(obj.table=="Yes") {
					output+="[/wraper]";
				}
				return output;

			}
		},
		{
			id:'orangethemesalert',
			image:'btn-alert-box.png',
			title:'Alert Box',
			allowSelection:false,
			fields:[{id:'color', name:'Color', color:"c24000", colorpalette:true},{id:'icon', name:'Icon', values:ot_icons()},{id:'text', name:'Text', textarea:true}],
			generateHtml:function(obj){
				
				return '[alert color="'+obj.color+'" icon="'+obj.icon+'"]'+obj.text+'[/alert]';
				
				

			}
		},
		{
			id:'orangethemesmap',
			image:'map-icon.png',
			title:'Google Map',
			allowSelection:false,
			fields:[{id:'link', name:'Google Map URL'}],
			generateHtml:function(obj){
				return '[googlemap]'+obj.link+'[/googlemap]';
			}
		},

		{
			id:'orangethemeslists',
			image:'btn-lists.png',
			title:'Lists',
			allowSelection:false,
			fields:[{id:'type-1', name:'Type', values:ot_icons()},{id:'lists', name:'Text', lists:true}],
			generateHtml:function(obj){
				var x = jQuery('#ot-lists').val();  
				var output = '[list]';
				for(e = 1; e <= x; e++) {
					var code = jQuery('#orangethemes-shortcode-type-'+e).val();
					output+= '[item icon="'+code+'" ]';
					output+= jQuery('#orangethemes-shortcode-lists-'+e).val();
					output+= '[/item]';
				}
				output+="[/list]";
				
				return output;
			}
		},
		{
			id:'orangethemesgallery',
			image:'btn-gallery.png',
			title:'Insert Gallery Preview',
			allowSelection:false,
			fields:[{id:'links', name:'Gallery Link' }],
			generateHtml:function(obj){
				return '[ot-gallery url="'+obj.links+'"]';
			}
		},
		{
			id:'orangethemescaption',
			image:'btn-image.png',
			title:'Image Caption',
			allowSelection:false,
			fields:[{id:'caption_title', name:'Title'},{id:'link', name:'Image URL', upload:true}],
			generateHtml:function(obj){
				return '[ot-caption title="'+obj.caption_title+'" url="'+obj.link+'"]';
			}
		},
		{
			id:'orangethemesbreak',
			image:'cpanel-btn-break.png',
			title:'Insert Breake',
			allowSelection:false,
			generateHtml:function(){
				return '<br class="clear" />';
			}
		},
	
		{
			id:'orangethemessocial',
			image:'cpanel-btn-social.png',
			title:'Social Icon',
			allowSelection:false,
			fields:[{id:'icon', name:'Type', values:['fa-adn','fa-android','fa-apple','fa-bitbucket','fa-bitbucket-square','fa-bitcoin','fa-btc','fa-css3','fa-dribbble','fa-dropbox','fa-facebook','fa-facebook-square','fa-flickr','fa-foursquare','fa-github','fa-github-alt','fa-github-square','fa-gittip','fa-google-plus','fa-google-plus-square','fa-html5','fa-instagram','fa-linkedin','fa-linkedin-square','fa-linux','fa-maxcdn','fa-pagelines','fa-pinterest','fa-pinterest-square','fa-renren','fa-skype','fa-stack-exchange','fa-stack-overflow','fa-trello','fa-tumblr','fa-tumblr-square','fa-twitter','fa-twitter-square','fa-vimeo-square','fa-vk','fa-weibo','fa-windows','fa-xing','fa-xing-square','fa-youtube','fa-youtube-play','fa-youtube-square']},{id:'link', name:'Link To Account'},{id:'title', name:'Title'},{id:'subtitle', name:'Subtitle'}],
			generateHtml:function(obj){
				
				return '[social title="'+obj.title+'" subtitle="'+obj.subtitle+'" link="'+obj.link+'" icon="'+obj.icon+'"]';

			}
		},
		{
			id:'orangethemestabs',
			image:'btn-tabs.png',
			title:'Insert Tabs',
			allowSelection:false,
			fields:[{id:'title-1', name:'Title: '},{id:'text', name:'Text: ', tabs:true}],
			generateHtml:function(obj){
				var x = jQuery('#ot-tabs').val();  
				var output = '[tabs]';
				for(e = 1; e <= x; e++) {
					output+= '[tab ';
					output+= 'title ="'+jQuery('#orangethemes-shortcode-title-'+e).val()+'"]';
					output+= jQuery('#orangethemes-shortcode-text-'+e).val();
					output+= '[/tab]';
				}
				output+="[/tabs]";
				
				return output;
			}
		},
		{
			id:'orangethemesparagraph',
			image:'btn-paragraph-2.png',
			title:'Insert Paragraph',
			allowSelection:false,
			generateHtml:function(obj){
				return '[row][double_paragraph]Left Side Content [/double_paragraph][double_paragraph] Right Side Content [/double_paragraph] [/row]';
			}
		},
		{
			id:'orangethemesparagraph2',
			image:'btn-paragraph-3.png',
			title:'Insert Paragraph',
			allowSelection:false,
			generateHtml:function(obj){
				return '[row][third_paragraph] Left Side Content [/third_paragraph][third_paragraph] Middle Content [/third_paragraph][third_paragraph] Right Side Content [/third_paragraph][/row]';
			}
		},
		{
			id:'orangethemesparagraph5',
			image:'btn-columns-4.png',
			title:'Insert Paragraph',
			allowSelection:false,
			generateHtml:function(obj){
				return '[row][forth_paragraph] CONTENT [/forth_paragraph][forth_paragraph] CONTENT [/forth_paragraph][forth_paragraph] CONTENT [/forth_paragraph][forth_paragraph] CONTENT [/forth_paragraph][/row]';
			}
		},
		{
			id:'orangethemesparagraph3',
			image:'btn-paragraph-right.png',
			title:'Insert Paragraph',
			allowSelection:false,
			generateHtml:function(obj){
				return '[row][paragraph_left] Left Side Content [/paragraph_left][third_paragraph] Right Side Content [/third_paragraph][/row]';
			}
		},
		{
			id:'orangethemesparagraph4',
			image:'btn-paragraph-left.png',
			title:'Insert Paragraph',
			allowSelection:false,
			generateHtml:function(obj){
				return '[row][third_paragraph] Left Side Content [/third_paragraph][paragraph_right] Right Side Content [/paragraph_right][/row]';
			}
		}
		
];

/**
 * Contains the main formatting buttons functionality.
 */
orangethemesButtonManager={
	dialog:null,
	idprefix:'orangethemes-shortcode-',
	ie:false,
	opera:false,
		
	/**
	 * Init the formatting button functionality.
	 */
	init:function(){
			
		var length=orangethemesButtons.length;
		for(var i=0; i<length; i++){
		
			var btn = orangethemesButtons[i];
			orangethemesButtonManager.loadButton(btn);
			
		}
		
		if ( jQuery.browser.msie ) {
			orangethemesButtonManager.ie=true;
		}
		
		if (jQuery.browser.opera){
			orangethemesButtonManager.opera=true;
		}
		
	},
	
	/**
	 * Loads a button and sets the functionality that is executed when the button has been clicked.
	 */
	loadButton:function(btn){
		
		tinymce.create('tinymce.plugins.'+btn.id, {
	        init : function(ed, url) {
			        ed.addButton(btn.id, {
	                title : btn.title,
	                image : url+'/buttons/'+btn.image,
	                onclick : function() {
			        	
			           var selection = ed.selection.getContent();
	                   if(btn.allowSelection && selection && btn.fields){
							
	                	   //there are inputs to fill in, show a dialog to fill the required data
	                	   orangethemesButtonManager.showDialog(btn, ed);
	                   }else if(btn.allowSelection && selection){
							
	                	   //modification via selection is allowed for this button and some text has been selected
							selection = btn.generateHtml(selection);
							ed.selection.setContent(selection);
	                   }else if(btn.fields){
	                	   //there are inputs to fill in, show a dialog to fill the required data
	                	   orangethemesButtonManager.showDialog(btn, ed);
	                   }else if(btn.list){
	                	   ed.dom.remove('orangethemescaret');
		           		    ed.execCommand('mceInsertContent', false, '&nbsp;');	
	           			
	                	    //this is a list
	                	    var list, dom = ed.dom, sel = ed.selection;
	                	    
		               		// Check for existing list element
		               		list = dom.getParent(sel.getNode(), 'ul');
		               		
		               		// Switch/add list type if needed
		               		ed.execCommand('InsertUnorderedList');
		               		
		               		// Append styles to new list element
		               		list = dom.getParent(sel.getNode(), 'ul');
		               		
		               		if (list) {
		               			dom.addClass(list, btn.list);
		               		}
	                   }else{
	                	   //no data is required for this button, insert the generated HTML
	                	   ed.execCommand('mceInsertContent', true, btn.generateHtml());
	                   }
					   

						addLoadEvent(jscolor.init);
						
						jQuery("#orangethemes-shortcode-style").change(function () {
						    if (jQuery(this).val() == 'Spacer 6' || jQuery(this).val() == 'Spacer 7') {
						        jQuery("#orangethemes-shortcode-color").removeAttr('disabled');
						    } else {
						        jQuery("#orangethemes-shortcode-color").attr('disabled', 'disabled').val('');
						    }
						});
			
	                }
	            });
	        }
	    });
		
	    tinymce.PluginManager.add(btn.id, tinymce.plugins[btn.id]);
	},
	
	/**
	 * Displays a dialog that contains fields for inserting the data needed for the button.
	 */
	showDialog:function(btn, ed){

		
		if(orangethemesButtonManager.ie){
			ed.dom.remove('orangethemescaret');
		    var caret = '<div id="orangethemescaret">&nbsp;</div>';
		    ed.execCommand('mceInsertContent', false, caret);	
			var selection = ed.selection;
		}
	    
		var html='<div>';
		var selection = ed.selection;
		var selectedvalue = ed.selection.getContent();

		for(var i=0, length=btn.fields.length; i<length; i++){
			var field=btn.fields[i], inputHtml='';
			if(btn.fields[i].selesction){
				//this field should be a text area
				if(selectedvalue){ 
					// unlimited input
					html+='<div class="orangethemes-shortcode-field"><label>Selected Text</label><input type="text" value="'+selectedvalue+'" id="'+orangethemesButtonManager.idprefix+"selection"+'"></div><div>';
				} 
				
			}

			if(btn.fields[i].colorpalette){
					if(btn.fields[i].disabled) {
						var disabled = "disabled";
					} else {
						var disabled = false;
					}

					//this field should be a text area
					inputHtml='<input type="text" class="color" value="'+btn.fields[i].value+'" id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'" '+disabled+'>';
			} else if(btn.fields[i].values && !btn.fields[i].disabled){
				//this is a select list
				inputHtml='<select id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'">';
				jQuery.each(btn.fields[i].values, function(index, value){
					inputHtml+='<option value="'+value+'">'+value+'</option>';
				});
				inputHtml+='</select>';
			}else{
				if(btn.fields[i].textarea && !orangethemesButtonManager.opera){
					//this field should be a text area
					inputHtml='<textarea id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'" ></textarea>';
				} else if(btn.fields[i].upload && !orangethemesButtonManager.opera){ 
					// upload input
					inputHtml='<input type="text" id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'" class="ot-upload-field"/><a href="#" class="ot-upload-button">Button</a>';
				} else if(btn.fields[i].unlimitedinput && !orangethemesButtonManager.opera){ 
					// unlimited input
					inputHtml='<input type="text" class="otlist" id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'-1" /><input type="text" id="ot-list" value="1" hidden /><br /><br /><strong>To add new field press Enter</strong>';
				}  else if(btn.fields[i].disabled && !orangethemesButtonManager.opera){ 
					//this is a select list
					inputHtml='<select id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'" disabled>';
					jQuery.each(btn.fields[i].values, function(index, value){
						inputHtml+='<option value="'+value+'">'+value+'</option>';
					});
					inputHtml+='</select>';
				} else if(btn.fields[i].lists && !orangethemesButtonManager.opera){ 
					// unlimited input
					inputHtml='<input type="text" class="lists" id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'-1" /><input type="text" id="ot-lists" value="1" hidden /><br /><br /><strong>To add new field press Enter</strong>';
				} else if(btn.fields[i].tabs && !orangethemesButtonManager.opera){ 
					// unlimited input
					inputHtml='<textarea id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'-1"  class="tabs" ></textarea><input type="text" id="ot-tabs" value="1" hidden /><br /><br /><strong>To add new field press Enter</strong>';
				} else if(btn.fields[i].toggles && !orangethemesButtonManager.opera){ 
					// unlimited input
					inputHtml='<textarea id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'-1"  class="accordion" ></textarea><input type="text" id="ot-toggles" value="1" hidden /><br /><br /><strong>To add new field press Enter</strong>';
				}else{
					//this field should be a normal input
					inputHtml='<input type="text" id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'" />';
				}
			}
			html+='<div class="orangethemes-shortcode-field"><label>'+btn.fields[i].name+'</label>'+inputHtml+'</div>';
		}
		html+='<a href="" id="insertbtn" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button"><span class="ui-button-text">Insert</span></a></div>';
				
		var dialog = jQuery(html).dialog({
							 title:btn.title, 
							 modal:true,
							 close:function(event, ui){
								jQuery(this).html('').remove();
							 }
							 });
		
		orangethemesButtonManager.dialog=dialog;
		
		//set a click handler to the insert button
		dialog.find('#insertbtn').click(function(event){
			event.preventDefault();
			orangethemesButtonManager.executeCommand(ed,btn,selection);
		});

			dialog.keyup(function(){
			  if(event.keyCode == 13 && jQuery(".otlist").is(":focus")) {
				var i = jQuery('#ot-list').val();
				var n = Number(i)+Number(1);
				jQuery('<input type="text" class="otlist" id="orangethemes-shortcode-list-'+n+'" />').insertAfter("#orangethemes-shortcode-list-"+i);    
				jQuery('#ot-list').val(n);
			  }
			});
			
			dialog.keyup(function(){
			  if(event.keyCode == 13 && jQuery(".tabs").is(":focus") && jQuery('#ot-tabs').val() <5) {
				var i = jQuery('#ot-tabs').val();
				var n = Number(i)+Number(1);
				jQuery('<div class="orangethemes-shortcode-field"><label>Title: </label><input type="text" id="orangethemes-shortcode-title-'+n+'"></div><div class="orangethemes-shortcode-field"><label>Text: </label><textarea id="orangethemes-shortcode-text-'+n+'" class="tabs"></textarea></div>').insertBefore("#insertbtn");    
				jQuery('#ot-tabs').val(n);
			  }
			});
			
			dialog.keyup(function(){
			  if(event.keyCode == 13 && jQuery(".lists").is(":focus")) {
				var i = jQuery('#ot-lists').val();
				var n = Number(i)+Number(1);
				var ii;
				var icons = ot_icons();
				var iconsHTML='';
				for (ii = 0; ii < icons.length; ++ii) {
				    iconsHTML+= "<option name='"+icons[ii]+"'>"+icons[ii]+"</option>";
				}
				jQuery('<div class="orangethemes-shortcode-field"><label>Type</label><select id="orangethemes-shortcode-type-'+n+'">'+iconsHTML+'</select></div><div class="orangethemes-shortcode-field"><label>Text</label><input type="text" class="lists" id="orangethemes-shortcode-lists-'+n+'"></div>').insertBefore("#insertbtn");    
				jQuery('#ot-lists').val(n);
			  }
			});
			dialog.keyup(function(){
				if(event.keyCode == 13 && jQuery(".accordion").is(":focus") && jQuery('#ot-toggles').val() <5 ) {
					var i = jQuery('#ot-toggles').val();
					var n = Number(i)+Number(1);
					jQuery('<div class="orangethemes-shortcode-field"><label>Title: </label><input type="text" id="orangethemes-shortcode-title-'+n+'"></div><div class="orangethemes-shortcode-field"><label>Text: </label><textarea id="orangethemes-shortcode-text-'+n+'" class="accordion"></textarea></div>').insertBefore("#insertbtn");    
					jQuery('#ot-toggles').val(n);
				}
			});
	},
	/**
	 * Executes a command when the insert button has been clicked.
	 */
	executeCommand:function(ed, btn, selection){

    		var values={}, html='';
    		var selection = ed.selection.getContent();
    		if(!btn.allowSelection){
    			//the button doesn't allow selection, generate the values as an object literal
	    		for(var i=0, length=btn.fields.length; i<length; i++){
	        		var id=btn.fields[i].id,
	        			value=jQuery('#'+orangethemesButtonManager.idprefix+id).val();
	        		
	    			values[id]=value;
	    		}
	    		html = btn.generateHtml(values);
    		}else{
				var values={};
    			//the button allows selection - only one value is needed for the formatting, so
    			//return this value only (not an object literal)
    			values[btn.fields[0].id]=jQuery('#'+orangethemesButtonManager.idprefix+btn.fields[0].id).attr("value");
				if(btn.fields.length>=2) {
					values[btn.fields[1].id]=jQuery('#'+orangethemesButtonManager.idprefix+btn.fields[1].id).attr("value");
				}
				values["selection"]= jQuery('#'+orangethemesButtonManager.idprefix+"selection").attr("value");

    			html = btn.generateHtml(values);
    		}
    		
    	orangethemesButtonManager.dialog.remove();

    	if(orangethemesButtonManager.ie){
	    	selection.select(ed.dom.select('div#orangethemescaret')[0], false);
	    	ed.dom.remove('orangethemescaret');
    	}

  		ed.execCommand('mceInsertContent', false, html);
    	
	}
};

/**
 * Init the formatting functionality.
 */
(function() {
	
	orangethemesButtonManager.init();
    
})();

function ot_icons() {
	return ['Select a Icon','fa-glass',
'fa-music',
'fa-search',
'fa-envelope-o',
'fa-heart',
'fa-star',
'fa-star-o',
'fa-user',
'fa-film',
'fa-th-large',
'fa-th',
'fa-th-list',
'fa-check',
'fa-times',
'fa-search-plus',
'fa-search-minus',
'fa-power-off',
'fa-signal',
'fa-cog',
'fa-trash-o',
'fa-home',
'fa-file-o',
'fa-clock-o',
'fa-road',
'fa-download',
'fa-arrow-circle-o-down',
'fa-arrow-circle-o-up',
'fa-inbox',
'fa-play-circle-o',
'fa-repeat',
'fa-refresh',
'fa-list-alt',
'fa-lock',
'fa-flag',
'fa-headphones',
'fa-volume-off',
'fa-volume-down',
'fa-volume-up',
'fa-qrcode',
'fa-barcode',
'fa-tag',
'fa-tags',
'fa-book',
'fa-bookmark',
'fa-print',
'fa-camera',
'fa-font',
'fa-bold',
'fa-italic',
'fa-text-height',
'fa-text-width',
'fa-align-left',
'fa-align-center',
'fa-align-right',
'fa-align-justify',
'fa-list',
'fa-outdent',
'fa-indent',
'fa-video-camera',
'fa-picture-o',
'fa-pencil',
'fa-map-marker',
'fa-adjust',
'fa-tint',
'fa-pencil-square-o',
'fa-share-square-o',
'fa-check-square-o',
'fa-arrows',
'fa-step-backward',
'fa-fast-backward',
'fa-backward',
'fa-play',
'fa-pause',
'fa-stop',
'fa-forward',
'fa-fast-forward',
'fa-step-forward',
'fa-eject',
'fa-chevron-left',
'fa-chevron-right',
'fa-plus-circle',
'fa-minus-circle',
'fa-times-circle',
'fa-check-circle',
'fa-question-circle',
'fa-info-circle',
'fa-crosshairs',
'fa-times-circle-o',
'fa-check-circle-o',
'fa-ban',
'fa-arrow-left',
'fa-arrow-right',
'fa-arrow-up',
'fa-arrow-down',
'fa-share',
'fa-expand',
'fa-compress',
'fa-plus',
'fa-minus',
'fa-asterisk',
'fa-exclamation-circle',
'fa-gift',
'fa-leaf',
'fa-fire',
'fa-eye',
'fa-eye-slash',
'fa-exclamation-triangle',
'fa-plane',
'fa-calendar',
'fa-random',
'fa-comment',
'fa-magnet',
'fa-chevron-up',
'fa-chevron-down',
'fa-retweet',
'fa-shopping-cart',
'fa-folder',
'fa-folder-open',
'fa-arrows-v',
'fa-arrows-h',
'fa-bar-chart-o',
'fa-twitter-square',
'fa-facebook-square',
'fa-camera-retro',
'fa-key',
'fa-cogs',
'fa-comments',
'fa-thumbs-o-up',
'fa-thumbs-o-down',
'fa-star-half',
'fa-heart-o',
'fa-sign-out',
'fa-linkedin-square',
'fa-thumb-tack',
'fa-external-link',
'fa-sign-in',
'fa-trophy',
'fa-github-square',
'fa-upload',
'fa-lemon-o',
'fa-phone',
'fa-square-o',
'fa-bookmark-o',
'fa-phone-square',
'fa-twitter',
'fa-facebook',
'fa-github',
'fa-unlock',
'fa-credit-card',
'fa-rss',
'fa-hdd-o',
'fa-bullhorn',
'fa-bell',
'fa-certificate',
'fa-hand-o-right',
'fa-hand-o-left',
'fa-hand-o-up',
'fa-hand-o-down',
'fa-arrow-circle-left',
'fa-arrow-circle-right',
'fa-arrow-circle-up',
'fa-arrow-circle-down',
'fa-globe',
'fa-wrench',
'fa-tasks',
'fa-filter',
'fa-briefcase',
'fa-arrows-alt',
'fa-users',
'fa-link',
'fa-cloud',
'fa-flask',
'fa-scissors',
'fa-files-o',
'fa-paperclip',
'fa-floppy-o',
'fa-square',
'fa-bars',
'fa-list-ul',
'fa-list-ol',
'fa-strikethrough',
'fa-underline',
'fa-table',
'fa-magic',
'fa-truck',
'fa-pinterest',
'fa-pinterest-square',
'fa-google-plus-square',
'fa-google-plus',
'fa-money',
'fa-caret-down',
'fa-caret-up',
'fa-caret-left',
'fa-caret-right',
'fa-columns',
'fa-sort',
'fa-sort-asc',
'fa-sort-desc',
'fa-envelope',
'fa-linkedin',
'fa-undo',
'fa-gavel',
'fa-tachometer',
'fa-comment-o',
'fa-comments-o',
'fa-bolt',
'fa-sitemap',
'fa-umbrella',
'fa-clipboard',
'fa-lightbulb-o',
'fa-exchange',
'fa-cloud-download',
'fa-cloud-upload',
'fa-user-md',
'fa-stethoscope',
'fa-suitcase',
'fa-bell-o',
'fa-coffee',
'fa-cutlery',
'fa-file-text-o',
'fa-building-o',
'fa-hospital-o',
'fa-ambulance',
'fa-medkit',
'fa-fighter-jet',
'fa-beer',
'fa-h-square',
'fa-plus-square',
'fa-angle-double-left',
'fa-angle-double-right',
'fa-angle-double-up',
'fa-angle-double-down',
'fa-angle-left',
'fa-angle-right',
'fa-angle-up',
'fa-angle-down',
'fa-desktop',
'fa-laptop',
'fa-tablet',
'fa-mobile',
'fa-circle-o',
'fa-quote-left',
'fa-quote-right',
'fa-spinner',
'fa-circle',
'fa-reply',
'fa-github-alt',
'fa-folder-o',
'fa-folder-open-o',
'fa-smile-o',
'fa-frown-o',
'fa-meh-o',
'fa-gamepad',
'fa-keyboard-o',
'fa-flag-o',
'fa-flag-checkered',
'fa-terminal',
'fa-code',
'fa-reply-all',
'fa-mail-reply-all',
'fa-star-half-o',
'fa-location-arrow',
'fa-crop',
'fa-code-fork',
'fa-chain-broken',
'fa-question',
'fa-info',
'fa-exclamation',
'fa-superscript',
'fa-subscript',
'fa-eraser',
'fa-puzzle-piece',
'fa-microphone',
'fa-microphone-slash',
'fa-shield',
'fa-calendar-o',
'fa-fire-extinguisher',
'fa-rocket',
'fa-maxcdn',
'fa-chevron-circle-left',
'fa-chevron-circle-right',
'fa-chevron-circle-up',
'fa-chevron-circle-down',
'fa-html5',
'fa-css3',
'fa-anchor',
'fa-unlock-alt',
'fa-bullseye',
'fa-ellipsis-h',
'fa-ellipsis-v',
'fa-rss-square',
'fa-play-circle',
'fa-ticket',
'fa-minus-square',
'fa-minus-square-o',
'fa-level-up',
'fa-level-down',
'fa-check-square',
'fa-pencil-square',
'fa-external-link-square',
'fa-share-square',
'fa-compass',
'fa-caret-square-o-down',
'fa-caret-square-o-up',
'fa-caret-square-o-right',
'fa-eur',
'fa-gbp',
'fa-usd',
'fa-inr',
'fa-jpy',
'fa-rub',
'fa-krw',
'fa-btc',
'fa-file',
'fa-file-text',
'fa-sort-alpha-asc',
'fa-sort-alpha-desc',
'fa-sort-amount-asc',
'fa-sort-amount-desc',
'fa-sort-numeric-asc',
'fa-sort-numeric-desc',
'fa-thumbs-up',
'fa-thumbs-down',
'fa-youtube-square',
'fa-youtube',
'fa-xing',
'fa-xing-square',
'fa-youtube-play',
'fa-dropbox',
'fa-stack-overflow',
'fa-instagram',
'fa-flickr',
'fa-adn',
'fa-bitbucket',
'fa-bitbucket-square',
'fa-tumblr',
'fa-tumblr-square',
'fa-long-arrow-down',
'fa-long-arrow-up',
'fa-long-arrow-left',
'fa-long-arrow-right',
'fa-apple',
'fa-windows',
'fa-android',
'fa-linux',
'fa-dribbble',
'fa-skype',
'fa-foursquare',
'fa-trello',
'fa-female',
'fa-male',
'fa-gittip',
'fa-sun-o',
'fa-moon-o',
'fa-archive',
'fa-bug',
'fa-vk',
'fa-weibo',
'fa-renren',
'fa-pagelines',
'fa-stack-exchange',
'fa-arrow-circle-o-right',
'fa-arrow-circle-o-left',
'fa-caret-square-o-left',
'fa-dot-circle-o',
'fa-wheelchair',
'fa-vimeo-square',
'fa-try',
'fa-plus-square-o'];
}

function ot_convert(str) {
  str = str.replace(/&/g, "&amp;");
  str = str.replace(/>/g, "&gt;");
  str = str.replace(/</g, "&lt;");
  str = str.replace(/"/g, "&quot;");
  str = str.replace(/'/g, "&#039;");
  return str;
}