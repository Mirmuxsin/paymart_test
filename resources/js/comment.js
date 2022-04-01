const $ = require('jquery');

const createComment = ({id, title, comment}) => {
    const commentsList = $('#comments')
    const commentBlock = `
        <li id="comment-${ id }" class="comment-block">
            <h5>${ title }</h5>
            <p>${ comment }</p>
        </li>
    `
    $('.not-comments').remove()
    commentsList.prepend(commentBlock)
}

const onAjaxFormSubmit = (e) => {
    e.preventDefault()

    let data = new FormData()
    const form = $(e.target)
    const type = form.attr('method') ?? 'GET'
    const url = form.attr('action')
    const button = form.find('button, [type="submit"]')

    const inputs = form.find('input, textarea')

    inputs.each((i, el) => {
        let name = $(el).attr('name')
        let value = $(el).val()
        data.append(name, value)
    })

    $.ajax({
        type, url, data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        beforeSend: () => {
            button.addClass('disabled').prop('disabled', true)
            inputs.removeClass('error')
            form.find('[class$="_error"]').text('')
        }
    }).done(res => {
        button.removeClass('disabled').prop('disabled', false)

        switch (res.status) {
            case 201:
                console.log(res)
                createComment(res.data)
                inputs.val('')
                break;

            case 400:
                $.each(res.errors, (id, [value]) => {
                    form.find(`[name="${id}"]`).addClass('error')
                    form.find(`.${id}_error`).text(value)
                })
                break;
        }
    })
}

$(document).ready(() => {
    const ajaxForm = $("[ajax-form]")

    ajaxForm
        .on('submit', onAjaxFormSubmit)
})
