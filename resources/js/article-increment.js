const $ = require('jquery')

const ArticleViewIncrement = () => {
    const url = $('meta[name="view-increment"]')
        .attr('content')

    $.ajax({
        url,
        type: 'POST',
    })

    .done(res => {
        $(".blog-views > p").text(res.count)
    })
}

$(document).ready(() => {
    setTimeout(ArticleViewIncrement, 5000)
})
