<div class="mod_external_content" id="mod_external_content_{$section_id}" style="width:{$width};height:{$height};background-color:#ccc;">
    <div class="mod_external_content_overlay">
		<h3>{$title}</h3>
		<div class="mod_external_content_content">
			{$info|EntityDecode}
			<div class="mod_external_content_confirm">
				<button class="btn btn-primary">{$button_text}</button>
			</div>
		</div>
    </div>
    <div class="mod_external_content_maplogo"></div>

</div>

    <div class="map_layer" style="display:none;width:{$width};height:{$height};">
        <iframe src="" border="0" style="width:{$width};height:{$height};"></iframe>
    </div>
<script>
$(function() {
    $("button.btn-primary").unbind("click").on("click", function() {
        $("div.mod_external_content").hide();
        $("div.map_layer iframe").attr("src","{$src}");
        $("div.map_layer").show();
    });
});
</script>