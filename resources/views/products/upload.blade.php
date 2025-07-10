<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
     <form action="{{ roue('products.storeFile') }}" method="post">
        @csrf
        Select a file to upload<br><input type="file" name="uploadFile" enctype="multipart/form-data">
        @error('uploadFile')
        @enderror
        <br>
        <button type="submit">Upload</button>
     </form>
</div>
