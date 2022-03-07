// Change to the YouTube video ID of preference.
var youtubeId = "wSHVrEt8ll4";

// Construct the source for the iframe player.
var iframeSrc = "https://www.youtube.com/embed/" + youtubeId;

// ID of container where video will be injected.
var videoContainerId = "video-background",
    videoContainer = $('#' + videoContainerId);

// YouTube player options.
// See https://developers.google.com/youtube/player_parameters#Parameters for more options.
var videoOptions = [
    'autoplay=1',
    'controls=0',
    'disablekb=1',
    'fs=0',
    'iv_load_policy=0',
    'loop=1', // Loop param requires `playlist` to work.
    'playlist=' + youtubeId, // Required for `loop` to work.
    'modestbranding=1',
    'showinfo=0',
    'mute=1',
    'cc_load_policy=0'
];

// Append additional params to the iframe player's source.
iframeSrc += "?" + videoOptions.join('&');

/**
 * jQuery plugin function that resizes element
 * to a specified ratio.
 */
$.fn.resizeToRatio = function(ratio_width, ratio_height, target_parent) {
    
    // If parent isn't provided, use the next parent.
    var parent = target_parent ? target_parent : this.parent();
    
    // Get parent's dimensions to use in calculations.
    // Use getBoundingClientRect() for accuracy.
    var parent_rect = parent[0].getBoundingClientRect(),
        parent_w = parent_rect.width,
        parent_h = parent_rect.height,
        parent_ratio = parent_h / parent_w;
    
    var ratio_base = ratio_height / ratio_width;
    
    // Round up to ensure all pixel space are filled.
    var this_height = Math.ceil(parent_h),
        this_width = Math.ceil(parent_w);
    
    if( parent_ratio > ratio_base ) {
        // When parent is wider than the base ratio, their heights
        // should match and this container shoud be stretched
        // HORIZONTALLY to match the base ratio. Round up to ensure
        // all pixel space are filled.
        this_width = Math.ceil(ratio_width * this_height / ratio_height);
    } else {
        // When parent is shorter than or the same as the base ratio, 
        // their widths should match and this container should be 
        // stretched VERTICALLY to match the base ratio. Round up to
        // ensure all pixels space are filled.
        this_height = Math.ceil(this_width * ratio_height / ratio_width);
    }
    
    // Resize this container
    this.css({
        height: this_height,
        width: this_width
    });
};

/**
 * Function that manages creating the video player and resizing its
 * container. Managed this way since this fires in two different areas.
 */
var initVideo = function() {
    // If the window's width is appropriate for video backgrounds...
    if( $(window).width() >= 768) {
        if( videoContainer.find("iframe").length <= 0) {
            // The YouTube player. We only need to recreate the iframe player.
            // If you want more control, you will have to look into using the
            // API script library.
            var player = $('<iframe>', {
                src: iframeSrc,
            });

            // Inject the YouTube player into the video container.
            player.appendTo(videoContainer);
        }
        
        // Resize container to 16:9, the ratio for all YouTube videos
        // In order for video to fill video container. Video container
        // gets resized to fit its parent container, while ensuring that
        // it maintains a 16:9 ratio in the process.
        videoContainer.resizeToRatio(16, 9);
    } else {
        // Otherwise, strip the video player and allow the fall
        // back background to come forward.
        videoContainer.find("iframe").remove();
    }
};

// First time creates the video player if conditions are right.
initVideo();

// Enure container is still 16:9 when the window resizes.
$(window).resize( initVideo );