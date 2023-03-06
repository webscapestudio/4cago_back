 @if (!$upper_banner == null)
   <div class="main-ad">
     <a class="main-ad__link" href="{{ $upper_banner->link }}">
       @if ($upper_banner->banner_image_mob)
         <picture>
           <source srcset="{{ asset('storage/' . $upper_banner->banner_image_mob) }}" type="image/webp"><img
             src="{{ asset('storage/' . $upper_banner->banner_image_mob) }}" alt="" />
         </picture>
       @else
       @endif
       <p class="ad-text">Реклама</p>
     </a>
   </div>
 @endif
 @if (!$upper_banner == null)
   <div class="main-ad">
     <a class="main-ad__link" href="{{ $upper_banner->link }}">
       @if ($upper_banner->banner_image_tablet)
         <picture>
           <source srcset="{{ asset('storage/' . $upper_banner->banner_image_tablet) }}" type="image/webp"><img
             src="{{ asset('storage/' . $upper_banner->banner_image_tablet) }}" alt="" />
         </picture>
       @else
       @endif
       <p class="ad-text">Реклама</p>
     </a>
   </div>
 @endif
 @if (!$upper_banner == null)
   <div class="main-ad">
     <a class="main-ad__link" href="{{ $upper_banner->link }}">
       @if ($upper_banner->banner_image_desktop)
         <picture>
           <source srcset="{{ asset('storage/' . $upper_banner->banner_image_desktop) }}" type="image/webp"><img
             src="{{ asset('storage/' . $upper_banner->banner_image_desktop) }}" alt="" />
         </picture>
       @else
       @endif
       <p class="ad-text">Реклама</p>
     </a>
   </div>
 @endif
