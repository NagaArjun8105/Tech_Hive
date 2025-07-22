document.getElementById('continueBtn1').addEventListener('click', function() {
    document.getElementById('topic1Content').classList.add('hidden');
    document.getElementById('listSection').classList.remove('hidden');  // Show list section
    document.getElementById('topic2Content').classList.remove('hidden');
});
 // Toggle details in expandable list
 function toggleDetails(id) {
        let details = document.getElementById('details' + id);
        details.classList.toggle('hidden');
    }

   // Continue button in Topic 1: Switch to Topic 2
   document.getElementById('continueBtn1').addEventListener('click', function() {
        document.getElementById('topic1Content').classList.add('hidden');
        document.getElementById('topic2Content').classList.remove('hidden');

        // Change active topic to Topic 2
        document.querySelectorAll('.sidebar a').forEach(a => a.classList.remove('active'));
        document.getElementById('topic2').classList.add('active');
    });

    // Continue button in Topic 2: Switch to Topic 3
    document.getElementById('continueBtn2').addEventListener('click', function() {
        document.getElementById('topic2Content').classList.add('hidden');
        document.getElementById('topic3Content').classList.remove('hidden');

        // Change active topic to Topic 3
        document.querySelectorAll('.sidebar a').forEach(a => a.classList.remove('active'));
        document.getElementById('topic3').classList.add('active');
    });
 
    document.getElementById('continueBtn3').addEventListener('click', function() {
    document.getElementById('topic3Content').classList.add('hidden'); // Hide topic 3
    document.getElementById('topic4Content').classList.remove('hidden'); // Show topic 4

    // Change active topic to Topic 4 in the sidebar
    document.querySelectorAll('.sidebar a').forEach(a => a.classList.remove('active'));
    document.getElementById('topic4').classList.add('active');
});

    // Sidebar Click Events
    document.getElementById('topic1').addEventListener('click', function() {
        document.getElementById('topic1Content').classList.remove('hidden');
        document.getElementById('topic2Content').classList.add('hidden');
        document.getElementById('topic3Content').classList.add('hidden');
        document.getElementById('topic4Content').classList.add('hidden');

        document.querySelectorAll('.sidebar a').forEach(a => a.classList.remove('active'));
        document.getElementById('topic1').classList.add('active');
    });

    document.getElementById('topic2').addEventListener('click', function() {
        document.getElementById('topic1Content').classList.add('hidden');
        document.getElementById('topic2Content').classList.remove('hidden');
        document.getElementById('listSection').classList.remove('hidden')
        document.getElementById('topic3Content').classList.add('hidden');
        document.getElementById('topic4Content').classList.add('hidden');


        document.querySelectorAll('.sidebar a').forEach(a => a.classList.remove('active'));
        document.getElementById('topic2').classList.add('active');
    });

    document.getElementById('topic3').addEventListener('click', function() {
        document.getElementById('topic1Content').classList.add('hidden');
        document.getElementById('topic2Content').classList.add('hidden');
        document.getElementById('topic3Content').classList.remove('hidden');
        document.getElementById('topic4Content').classList.add('hidden');


        document.querySelectorAll('.sidebar a').forEach(a => a.classList.remove('active'));
        document.getElementById('topic3').classList.add('active');
    });

    // Sidebar Click Event for Topic 4
document.getElementById('topic4').addEventListener('click', function() {
    document.getElementById('topic1Content').classList.add('hidden');
    document.getElementById('topic2Content').classList.add('hidden');
    document.getElementById('topic3Content').classList.add('hidden');
    document.getElementById('topic4Content').classList.remove('hidden'); // Show topic 4

    document.querySelectorAll('.sidebar a').forEach(a => a.classList.remove('active'));
    document.getElementById('topic4').classList.add('active');
});

document.getElementById('continueBtn4').addEventListener('click', function() {
    window.location.href = 'quiz.php'; // Redirect to the quiz page
});
