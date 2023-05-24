<div class="card" style="width: 18rem;">
    <div class="card-header">
      {{ $title ?? "Tajuk"}}
    </div>
    <div class="card-body">
    {{ $slot ?? "Mesej"}}
  </div>
</div>
