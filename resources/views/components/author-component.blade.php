<div class="widget ltn__author-widget">
    <div class="ltn__author-widget-inner text-center">
        <img src="{{ $author->profile_photo_url }}" alt="{{ $author->name }}">
        <h5>{{ $author->name }}</h5>
        <small>{{ $author->getRoleName() }}</small>
        <div class="product-ratting">
            <ul>
                <li><a href="#"><em class="fas fa-star"></em></a></li>
                <li><a href="#"><em class="fas fa-star"></em></a></li>
                <li><a href="#"><em class="fas fa-star"></em></a></li>
                <li><a href="#"><em class="fas fa-star-half-alt"></em></a></li>
                <li><a href="#"><em class="far fa-star"></em></a></li>
                <li class="review-total"> <a href="#"> ( 1 Reviews )</a></li>
            </ul>
        </div>
        <p>Joined our system at {{ $author->created_at->diffForHumans() }}</p>
        <div class="ltn__social-media">
            <ul>
                <li><a href="#" title="Facebook"><em class="fab fa-facebook-f"></em></a></li>
                <li><a href="#" title="Twitter"><em class="fab fa-twitter"></em></a></li>
                <li><a href="#" title="Linkedin"><em class="fab fa-linkedin"></em></a></li>

                <li><a href="#" title="Youtube"><em class="fab fa-youtube"></em></a></li>
            </ul>
        </div>
    </div>
</div>
