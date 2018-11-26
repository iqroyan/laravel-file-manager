class App {
    constructor() {
        let name = 'app';
        console.log('app');
    }

    // browse directories
    browse(name) {
        var dir = $('#directoryBrowse').val();
        if (dir.length == 0) {
            $('#directoryBrowse').val(name);
        } else if (name == 'root') {
            $('#directoryBrowse').val(null);
        }
        else {
            $('#directoryBrowse').val(dir + '/' + name);
        }
        $('#BrowseForm').submit();
    }

    // create new directory
    newDirectory() {
        swal({
            title: 'نام پوشه رو وارد کنید',
            input: 'text',
            showCancelButton: true,
            showCloseButton: true,
            cancelButtonText: 'لغو',
            confirmButtonText: 'ایجاد',
            html: 'ssdf' + 'ddddddddddd',
            inputValidator: (value) => {
                return !value && 'You need to write something!'
            }
        })

    }

    dangerMode(el) {
        swal({
            title: 'مطمئن هستید',
            text: 'آیا عملیات انجام شود ؟ ',
            //         type: 'error',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'بله، مطمئنم !',
            cancelButtonText: 'لغو',
            backdrop: 'rgba(165, 43, 106, 0.45)'
        }).then((result) => {
            if (result.value) {
                let form = $(el).parent()[0];
                $(form).submit();
            }
        });
    }

    submit(form) {
        $('#' + form).submit();
    }

    updateInput(value, input) {
        $(input).val(value);
    }
}

let __app = new App();
console.log(__app);