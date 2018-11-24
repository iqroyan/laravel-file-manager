
class App{
    constructor(){
        let name='app';
        console.log('app');
    }
    // browse directories
    browse(name){
        var dir = $('#directoryBrowse').val();
        if (dir.length == 0) {
            $('#directoryBrowse').val(name);
        }else if(name =='root')
        {
            $('#directoryBrowse').val(null);
        }
        else {
            $('#directoryBrowse').val(dir + '/' + name);
        }
        $('#BrowseForm').submit();
    }
    // create new directory
    newDirectory()
    {
         swal({
        title: 'نام پوشه رو وارد کنید',
        input: 'text',
        showCancelButton: true,
             showCloseButton:true,
         cancelButtonText:'لغو',
        confirmButtonText:'ایجاد',
         html:'ssdf'+'ddddddddddd',
        inputValidator: (value) => {
            return !value && 'You need to write something!'
        }
    })

    }
    submit(form){
        $('#'+form).submit();
    }
}
let __app = new App();
console.log(__app);