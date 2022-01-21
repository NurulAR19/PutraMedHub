var facts = [
    '\"Don\'t be pushed around by the fears in your mind. Be led by the dreams in your heart.\"― Roy T. Bennett, The Light in the Heart',
    '\"Believing in yourself, if you can do that, you can make anything happen.\"– Johann Wolfgang von Goethe',
    '\" All our dreams can come true, if we have the courage to pursue them.\" – Walt Disney',
    '\"The secret of getting ahead is getting started.\"– Mark Twain',
    '\"Setting goals is the first step into turning the invisible into the visible. \"– Tony Robbins',
    '\"We are what we repeatedly do. Excellence, then, is not an act, but a habit.\" – Aristotle',
    '\"When you know what you want, and want it bad enough, you’ll find a way to get it.\" – Jim Rohn',
]

function newFacts(){
    var randomNumber = Math.floor(Math.random() * (facts.length));
    document.getElementById('factsDisplay').innerHTML = facts[randomNumber];
}
