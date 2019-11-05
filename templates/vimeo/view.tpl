<div class="mod_external_content" id="mod_external_content_{$section_id}" style="width:{$width};height:{$height};" title="{translate('Background image found on Pixabay')}">
    <div class="mod_external_content_overlay">
		<h3>{$title}</h3>
		<div class="mod_external_content_content">
		    <div class="mod_external_content_scroller">
                {$info|EntityDecode}
            </div>
            <div>
                <a class="mod_external_content_videolink" href="{$src}" rel="noopener" target="_blank" title="{translate('Show video on Vimeo')}">{translate('Show video on Vimeo')}:<br />{$src}</a>
            </div>
			<div class="mod_external_content_confirm" id="mod_external_content_confirm_{$section_id}">
				<button class="btn btn-primary">{translate($button_text)}</button>
			</div>
		</div>
    </div>
</div>

<div class="mod_external_content_video_layer" id="mod_external_content_video_{$section_id}" style="width:{$width};height:{$height};">
    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="" style="border:0;top:0;left:0;width:100%;height:100%;position:absolute;"></iframe>
</div>

<script>
$(function() {
    $("div#mod_external_content_confirm_{$section_id} button.btn-primary").unbind("click").on("click", function() {
        $("div#mod_external_content_{$section_id}").hide();
        $("div#mod_external_content_video_{$section_id} iframe").attr("src","{$framesrc}");
        $("div#mod_external_content_video_{$section_id}").show();
    });
});
</script>