<div>
    <nav wire:ignore class="page-nav">
        <!--<a class="page-nav__day page-nav__day_prev" href="#"></a>-->
        @for($i = 0; $i < 7; $i++)
            <a wire:key="{{ $i + 1 }}" class="page-nav__day" href="#">
                <span class="page-nav__day-week"></span><span class="page-nav__day-number"></span>
            </a> 
        @endfor 
        <a class="page-nav__day page-nav__day_next" href="#"></a> 

        @script
        <script>
            let data = '';
            Array.from(document.querySelectorAll('.page-nav__day')).forEach((item, i) => {
                item.addEventListener('click', (e) => { 
                    let index = Array.from(document.querySelectorAll('.page-nav__day')).findIndex(el => el.classList.contains('page-nav__day_chosen'));
                    console.log(index);
                    if(index >= 0) {
                        Array.from(document.querySelectorAll('.page-nav__day'))[index].classList.remove('page-nav__day_chosen');
                    }
                    Array.from(document.querySelectorAll('.page-nav__day'))[i].classList.add('page-nav__day_chosen');                    
                    data = Array.from(document.querySelectorAll('.page-nav__day-number'))[i].innerText;                    
                    Livewire.dispatch('handle-value', { value: data });
                    data = '';
                }
            )});
        </script>
        @endscript
    </nav>
    <p> Выбрана дата {{ $value }} </p>
</div>
