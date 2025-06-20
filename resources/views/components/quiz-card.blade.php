<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
     <div>
        <div>
           {{ $roundName }}
        </div>
        <div>
            Time Left: <span  id="countdown"></span>
        </div>
        <div>
            Gold Obtained: <span id="gold-obtained"></span>
        </div>
        <div>
            <h2>{{ $question }}</h2>
        </div>

        <div>
            <form action="{{ $action }}" method="POST">
                @csrf
                <input type="text" placeholder="Enter your answer..." required>
                <button type="submit">{{ $buttonValue }}</button>
            </form>
        </div>
     </div>
</div>
<script>

            // Get Laravel's PHP datetime string
        const deadline = new Date("{{ $deadline->toIso8601String() }}").getTime();

        const x = setInterval(function() {
            const now = new Date().getTime();
            const distance = deadline-now;
            console.log("deadline:"+deadline+" Now:"+now);


            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    console.log("min:"+minutes+" sec:"+seconds);
            document.getElementById("countdown").innerHTML = minutes + "m " + seconds + "s ";

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "⏰ Time's up!";
            }
        }, 1000);
</script>