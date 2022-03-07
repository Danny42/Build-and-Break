// Change to the Vimeo video ID of preference.
var vimeoId = "9190189";

// ID of container where video will be injected.
var videoContainerId = "video-background",
    videoContainer = $('#' + videoContainerId);

// Vimeo player options.
// See https://github.com/vimeo/player.js/#embed-options for more options.
var videoOptions = {
    id: vimeoId,
    
    // Video must be hosted on a pro account for this option to work
    background: true,
    
    byline: false,
    portrait: false,
    title: false
};

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

var initVideo = function() {
    // If the window's width is appropriate for video backgrounds...
    if( $(window).width() >= 768) {
        if( videoContainer.find("iframe").length <= 0) {
            // The Vimeo player. This also handles injecting it in the specified video container.
            var player = new Vimeo.Player(videoContainerId, videoOptions);

            // Mute the video.
            // Vimeo is different when you want to mute its sound playback.
            player.setVolume(0);
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