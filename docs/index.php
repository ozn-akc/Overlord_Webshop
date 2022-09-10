<?php include("../header.php");?>
<div id="content" class="main-container flex-wrap justify-content-center">
    <div class="d-flex flex-column align-items-center border-bottom pb-4 col-8" style="height: fit-content">
        <h1 class="text-center pb-4 mb-4">Home</h1>
        <div class="col-8">
            The Homepage contains a Videoplayer referencing a Playlist created Crunchyroll. The Playlist has the theme "Overlord".
        </div>
    </div>
    <div class="d-flex flex-column align-items-center border-bottom pb-4 col-8" style="height: fit-content">
        <h1 class="text-center pb-4 mt-4">Books</h1>
        <div class="col-8">
            The Bookspage contains a list of available Books. These are shown with their cover and their title.
            By clicking on the cover you can either log in or add the Book to your cart, depending on your login status.
            By clicking on the title you get taken to the article page containing the Book details.
        </div>
    </div>
    <div class="d-flex flex-column align-items-center border-bottom pb-4 col-8" style="height: fit-content">
        <h1 class="text-center pb-4 mt-4">Article</h1>
        <div class="col-8">
            The Articlepage shows the details of the page, containing the title, cover and description of the book.
            There is a button that lets you add the book to your cart.
        </div>
    </div>
    <div class="d-flex flex-column align-items-center border-bottom pb-4 col-8" style="height: fit-content">
        <h1 class="text-center pb-4 mt-4">NFTs</h1>
        <div class="col-8">
            The NFTpage contains a list of available NFTS. The user can choose any nft they like by clicking on it. The page get reloaded with the selected NFT and you can click the download button to download the NFT as a png.
        </div>
    </div>
    <div class="d-flex flex-column align-items-center border-bottom pb-4 col-8" style="height: fit-content">
        <h1 class="text-center pb-4 mt-4">News</h1>
        <div class="col-8">
            The Newspage shows all available Newspapers. The Books and NFT Newspaper can only be subscribed to when the user is logged in. The random Newsletter can be subscribed to when the user enters their Email address.
        </div>
    </div>
    <div class="d-flex flex-column align-items-center border-bottom pb-4 col-8" style="height: fit-content">
        <h1 class="text-center pb-4 mt-4">Account</h1>
        <div class="col-8">
            The Accountpage contains the Accountdata, which the user can update as they choose. They can change their name, their email, and their Address. The Postalcode autofills the city in order to prevent Wrong inputs.
        </div>
    </div>
    <div class="d-flex flex-column align-items-center pb-4 col-8" style="height: fit-content">
        <h1 class="text-center pb-4 mt-4">Cart</h1>
        <div class="col-8">
            The Cart contians the Items the user wants to buy, those Items are displayed in a List with their image, title and 3 buttons to add, remove a singular item and delete the entire Item from the cart.
            The Button at the end allows the user to "buy" those items, onclick the user is sent to the receipt page, where they get their receipt and the cart get deleted.
        </div>
    </div>
</div>
</body>