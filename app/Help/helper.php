<?php


use App\Models\Taqat2\Khadmat;
use App\Models\Taqat2\Talent;

function thems(){
    return [
        'taqat',

    ];
}


function setting($settingKey, $locale = null) {
    // If $locale is not provided, use the current application locale
    if (!$locale) {
        $locale = app()->getLocale(); // This retrieves the current application locale
    }

    $setting = \App\Models\Setting::where('key', $settingKey)->first();

    if ($setting) {
        return $setting->getTranslation('value', $locale);
    } else {
        // Handle case where setting with $settingKey is not found
        return 'Setting not found'; // or any appropriate fallback
    }
}




function posts(){
    return \App\Models\Post::orderBy('created_at','Desc')->get();
}




function appNew(){
    return \App\Models\Appointment::where('is_reade',0)->count();
}

function inboxNew(){
    return \App\Models\Inbox::where('is_reade',0)->count();
}


function sliders(){
    return \App\Models\Slider::all();
}

function partners(){
    return \App\Models\Partner::all();
}

function faqs(){
    return \App\Models\Question::all();
}


function section($section){
    return \App\Models\Section::where('name',$section)->first();
}

function gallery(){
    return \App\Models\Gallery::all();
}

function about(){
    return \App\Models\About::all();
}

function target(){
    return \App\Models\Target::all();
}


function categories(){
    return \App\Models\Category::all();
}

function service(){
    return \App\Models\Service::all();
}
function latestPosts(){
    return  \App\Models\Post::orderBy('created_at','desc')->get();
}
function testimonials(){
    return \App\Models\Testimonial::all();
}



function statusTask($status)
{

    if ($status == 0) {
        return 'غير مكتملة';
    } elseif ($status == 1) {
        return 'مكتملة';

    }
}



function status($status)
{

    if ($status == 1) {
        return 'success';
    } elseif ($status == 2) {
        return 'primary';
    } elseif ($status == 3) {
        return 'dark';
    } elseif ($status == 4) {
        return 'secondary';

    }
}


function priority($p = null)
{
    $religions = [
        '1' => 'عاجل',
        '2' =>'متوسط',
        '3' => 'غير عاجل',

    ];

    if ($p !== null) {
        return $religions[$p] ?? null;
    }
    return $religions;

}




function countNewMas(){
    $user= auth('talent')->user();
    return $user->chats->where('user_read',0)->count();
}




function countMas(){
    $user= auth('talent')->user();
    return $user->chats->count();
}

function statusOfferName($status)
{

    if ($status == 1) {
        return trans('main.pending');

    } elseif ($status == 2) {
        return trans('main.implementation');

    } elseif ($status == 3) {
        return trans('main.completed');


    } elseif ($status == 4) {
        return trans('main.excluded');

    }

}

function statusJobName($status)
{

    if ($status == 1) {
        return trans('main.open');

    } elseif ($status == 2) {
        return trans('main.pending');

    } elseif ($status == 3) {
        return trans('main.Hired');


    } elseif ($status == 4) {
        return trans('main.close');

    }
}

function statusName($status)
{

    if ($status == 1) {
        return trans('main.open');

    } elseif ($status == 2) {
        return trans('main.implementation');

    } elseif ($status == 3) {
        return trans('main.completed');


    } elseif ($status == 4) {
        return trans('main.canceled');

    }
}
function skills(){
    return [
        "Software Engineering",
        "Web Development",
        "Front-End Development",
        "Back-End Development",
        "Full-Stack Development",
        "Mobile App Development",
        "Game Development",
        "Embedded Systems Programming",
        "Graphic Design",
        "UI/UX Design",
        "Interaction Design",
        "Product Design",
        "Motion Graphics",
        "Video Editing",
        "3D Animation",
        "2D Animation",
        "VFX (Visual Effects)",
        "Typography",
        "Branding",
        "Illustration",
        "Photography",
        "Print Design",
        "Ada",
        "Adenine",
        "Agda",
        "Agilent VEE",
        "Python",
        "JavaScript",
        "TypeScript",
        "C++",
        "C#",
        "Java",
        "Ruby",
        "PHP",
        "Swift",
        "Kotlin",
        "R",
        "MATLAB",
        "HTML",
        "CSS",
        "Sass",
        "Less",
        "React",
        "Angular",
        "Vue.js",
        "Ember.js",
        "Backbone.js",
        "jQuery",
        "Bootstrap",
        "Tailwind CSS",
        "Node.js",
        "Express.js",
        "Django",
        "Flask",
        "Spring",
        "ASP.NET",
        "Ruby on Rails",
        "Laravel",
        "Symfony",
        "Golang",
        "Rust",
        "Scala",
        "Perl",
        "Elixir",
        "GraphQL",
        "SQL",
        "NoSQL",
        "MongoDB",
        "Firebase",
        "PostgreSQL",
        "MySQL",
        "SQLite",
        "Oracle Database",
        "Redis",
        "Apache Kafka",
        "Docker",
        "Kubernetes",
        "Adobe Photoshop",
        "Adobe Illustrator",
        "Adobe After Effects",
        "Adobe Premiere Pro",
        "Final Cut Pro",
        "Blender",
        "Cinema 4D",
        "Figma",
        "Sketch",
        "InVision",
        "Adobe XD",
        "Microsoft Word",
        "Microsoft Excel",
        "Microsoft PowerPoint",
        "Google Docs",
        "Google Sheets",
        "Google Slides",
        "PDF Editing",
        "Document Management",
        "Office Administration",
        "Business Communication",
        "Project Management",
        "Agile Methodologies",
        "Scrum",
        "Kanban",
        "Software Testing",
        "Quality Assurance",
        "Systems Analysis",
        "Network Engineering",
        "Database Administration",
        "Artificial Intelligence",
        "Machine Learning",
        "Deep Learning",
        "Data Science",
        "Big Data",
        "Computer Vision",
        "Natural Language Processing",
        "Robotics",
        "Automation",
        "Technological Entrepreneurship",
        "Startup Development",
        "IT Management",
        "Cybersecurity",
        "Blockchain",
        "Cloud Computing",
        "Internet of Things (IoT)",
        "Augmented Reality (AR)",
        "Virtual Reality (VR)",
        "DevOps",
        "Digital Marketing",
        "E-commerce",
        "Product Management",
        "Business Intelligence",
        "js"
    ];
}



function topTalents(){
    return \App\Models\Taqat2\Talent::orderBy('created_at')->take(8)->get();
}
function topCompanies(){
    return \App\Models\Taqat2\Company::orderBy('created_at')->take(8)->get();
}

function topKhadmat(){
    return \App\Models\Taqat2\Khadmat::with('user')->orderBy('created_at')->take(8)->get();
}



function khadmats()
{
    $query = Khadmat::with('category')
        ->orderBy('created_at')
        ->take(8)
        ->get()
        ->sortByDesc(function ($khadmat) {
            return $khadmat->averageReview(); // Sort by the computed averageReview
        });

    return $query;
}


function talents()
{
    // Fetch the data first
    $query = Talent::Wherefullprofile()
        ->with(['specialization', 'projects'])
        ->take(12)
        ->get(); // Get the records first

    // Perform calculations on the collection
    $query->each(function ($talent) {
        $totalExperienceMonths = $talent->work_experiences->reduce(function ($carry, $experience) {
            $startDate = new \DateTime($experience->start_date);
            $endDate = $experience->end_date ? new \DateTime($experience->end_date) : now();
            $interval = $startDate->diff($endDate);
            return $carry + ($interval->y * 12 + $interval->m);
        }, 0);

        // Add calculated total experience years as a property
        $talent->total_experience_years = ceil($totalExperienceMonths / 12);
    });

    return $query; // Return the collection
}





function Khadmat_categories()
{
    return \App\Models\Taqat2\KhadmaCategory::whereHas('khadmats')->orderBy('created_at')->get();

}

?>
