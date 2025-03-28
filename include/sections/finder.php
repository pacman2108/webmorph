<div id='finderInterface' class='interface'>
    <p class="msg" data-msg_id="finder_drag2">I've reinstated drag and drop for 
        moving files and folders in the finder, and moving files to the light table, 
        average box, and transform boxes. You can still move files between 
        folders by selecting them, copying (<span class="cmd">C</span>) or cutting 
        (<span class="cmd">X</span>) under the Edit menu, and pasting 
        (<span class="cmd">V</span>) into the new folder.
    </p>
    <p class="msg" data-msg_id="file_info">I've made a lot of changes to how JPG 
        and TEM files store their history. You can see the history in the Finder 
        under the preview image or template (only for new files; your old files 
        will not show a history). Let me know if there is other information that 
        you would like about your files. Information cannot be stored in GIF or 
        PNG images.
    </p>
    <p class="msg" data-msg_id="php7">We just upgraded from php5 to php7 and there 
        have been a few uncaught bugs. The file upload problem is fixed now. Please 
        let me know if you notice any further errors.
    </p>
    <p class="msg" data-msg_id="email_bug">I had some problems with registration 
        and password reset emails not sending. I think that's been fixed, but let 
        me know if you continue to have problems.
    </p>
        
    <input type="search" id="searchbar" name="searchbar" placeholder="Search for a file">
    <ul id='filepreview'>
        <img id='selectedImage' src='/include/images/loaders/circle' />
        <textarea id='selectedTem' readonly></textarea>
        <div id='fileinfo'>
            <h1>File Info</h1>
            <div></div>
        </div>
        <div id='history'>
            <h1>File History</h1>
            <div></div>
        </div>
    </ul>
    
    <div id='uploadbar'>
        <input class='textinput'
            id='upload'
            name='upload[]'
            type='file'
            value=''
            multiple='multiple'
            placeholder='Upload Images and Tems'
            style='width:320px'/>
    </div>
    
    <span id="finderpath"></span>

    <div id='finder' path='finder'></div>
    
    <div id='lightTable'><div>Drag images here to view or compare them.<br>
        Drag images to reorder and double-click to remove them.</div></div>
</div>
