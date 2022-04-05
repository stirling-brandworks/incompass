(function ($) {
   // Content Hub 
    var $postList = $('.fp-hub__list ul'),
        $loader = $('.fp-hub__list .fp-hub__loader')

    function getPostsForCategory(categoryId) {
        return fetch(`${icfp.restUrl}wp/v2/posts?per_page=4&categories=${categoryId}`)
            .then(function (response) { return response.json() })
    }

    function getFeaturedPostWithImage(postId) {
        return fetch(`${icfp.restUrl}wp/v2/posts/${postId}?_embed`)
            .then(function (response) { return response.json() })
    }

    function updateFeaturedPost(postId) {
        getFeaturedPostWithImage(postId)
            .then(post => {
                var image = post._embedded["wp:featuredmedia"][0];
                const date = new Date(post.date);
                $('.fp-hub__feature > img')
                    .attr({
                        src: image.source_url,
                        alt: image.alt_text
                    })
                $('.fp-hub__feature-content > span')
                    .text(`POSTED ON ${date.getMonth() + 1}/${date.getDate()}`)
                $('.fp-hub__feature-content #featureTitle').html(post.title.rendered)
                $('.fp-hub__feature-content > a').attr('href', post.link)
                $('.fp-hub__feature').show();
            })
    }

    function updatePostList(catId) {
        getPostsForCategory(catId)
            .then(function (posts) {
                $postList.empty();
                $loader.hide();
                $.each(posts, function (index, postData) {
                    $postList.append(Post(postData))
                })
            })
    }

    function Post(post) {
        const date = new Date(post.date)
        return `<li>
                <span>POSTED ON ${date.getMonth() + 1}/${date.getDate()}</span>
                <h3>
                    <a href="${post.link}">
                        ${decodeEntities(post.title.rendered)}
                    </a>
                </h3>
            </li>`
    }

    function decodeEntities(encodedString) {
        var textArea = document.createElement('textarea');
        textArea.innerHTML = encodedString;
        return textArea.value;
    }

    $('.fp-hub__nav-item button').on('click', function () {
        var index = $(this).parent().index();
        var categoryInfo = icfp.contentHubCats[index];

        var catId = categoryInfo.category;
        $('.fp-hub__nav-item').removeClass('fp-hub__nav-item--active')
        $(this).closest('li').addClass('fp-hub__nav-item--active')
        $postList.empty();
        $loader.show();
        
        updatePostList(catId)
        updateFeaturedPost(categoryInfo.featured_post)
    });

    $('.fp-hub__select').on('change', function () {
        var catId = $(this).val()
        $postList.empty();
        $loader.show();
        getPostsForCategory(catId)
            .then(function (posts) {
                $postList.empty();
                $loader.hide();
                $.each(posts, function (index, postData) {
                    $postList.append(Post(postData))
                })
            })
    });

    /**
     * Forward links for feature post to included accessible link
     */
    $('.fp-hub__feature').on('click', function () {
        const $link = $(this).find('a.fp-link-underline');
        if ($link.attr('href') === '#') {
            return;
        }
        window.location = $link.attr("href");
    });

    $(document).ready(function () {
        $loader.show()
        var initialCat = icfp.contentHubCats[0].category;
        var initialFeaturedPostId = icfp.contentHubCats[0].featured_post;
       
        updatePostList(initialCat)
        updateFeaturedPost(initialFeaturedPostId)
        
        // Counter
        var counters = document.querySelectorAll('.counter');
        for (var i = 0; i < counters.length; i++) {
            (new countUp.CountUp(
                counters[i],
                counters[i].dataset.count,
                {
                    useGrouping: false,
                }
            )).start();
        }
    })
})(jQuery);

/** Video Overlay */
var ytiFrameTag = document.createElement('script');
    ytiFrameTag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(ytiFrameTag, firstScriptTag);
var ytPlayer;

function onYouTubeIframeAPIReady() {
    ytPlayer = new YT.Player('fpBrandVideo', {
        height: '390',
        width: '640',
        videoId: window.icfp.videoId,
        playerVars: {
            controls: 1,
            rel: 0,
            modestbranding: 1
        },
        events: {
            'onStateChange': onPlayerStateChange
        }
    });
}

    function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {
        closeVideoModal()
    }
}

function openVideoModal() {
    return new Promise(function (resolve, reject) {
        jQuery('body').css('overflow', 'hidden');
        jQuery('.fp-video__overlay, .fp-video__modal').fadeIn('slow', resolve);
    })
}

function closeVideoModal() {
    if (ytPlayer) ytPlayer.pauseVideo();
    jQuery('body').css('overflow', '');
    jQuery('.fp-video__overlay, .fp-video__modal').fadeOut('slow');
}


jQuery('#playFpVideo').on('click', function () {
    openVideoModal()
        .then(function () {
            if (ytPlayer) ytPlayer.playVideo();
        })
});

jQuery(document).on('touchend, mouseup', function (e) {
    if (!jQuery('.fp-video__modal').is(e.target)) {
        closeVideoModal()
    }
});