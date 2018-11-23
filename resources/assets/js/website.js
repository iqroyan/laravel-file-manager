
class App{
    constructor(){
        let name='app';
        console.log('app');
    }
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
}
let __app = new App();
console.log(__app);