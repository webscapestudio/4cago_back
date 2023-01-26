 @if (!$upper_banner == null)
   <div class="main-ad">
     <a class="main-ad__link" href="{{ $upper_banner->link }}">
       @if ($upper_banner->banner_image)
         <picture>
           <source srcset="{{ asset('storage/' . $upper_banner->banner_image) }}" type="image/webp"><img
             src="{{ asset('storage/' . $upper_banner->banner_image) }}" alt="" />
         </picture>
       @else
       @endif
       <p class="ad-text">Реклама</p>
     </a>
   </div>
 @endif
