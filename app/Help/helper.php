<?php


use App\Models\Taqat2\Khadmat;
use App\Models\Taqat2\Talent;
use Illuminate\Support\Facades\Cache;


function thems(){
    return [
        'taqat',

    ];
}


function setting($settingKey, $locale = null)
{
    // Retrieve the settings array from the singleton
    $settings = app('settings');

    if (!$locale) {
        $locale = app()->getLocale(); // Use the current application locale
    }

    if (isset($settings[$settingKey])) {
        $value = $settings[$settingKey];

        // Handle translations (if the value is JSON or requires localization)
        if (is_array($value) || isJson($value)) {
            $translations = json_decode($value, true);
            return $translations[$locale] ?? $translations['default'] ?? $value;
        }

        return $value;
    }

    // Handle case where the key does not exist
    return 'Setting not found'; // Or a fallback value
}


// Helper to check if a string is JSON
function isJson($string)
{
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}





function posts(){
    return \App\Models\Post::orderBy('created_at','Desc')->get();
}



function projects_company(){
    return \App\Models\Taqat2\CompanyProject::orderBy('created_at','Desc')->take(8)->get();
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



function section($section)
{
    return Cache::remember("section_{$section}", now()->addMinutes(60), function () use ($section) {
        return \App\Models\Section::where('name', $section)->first();
    });
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


function statusOffers($status)
{

    if ($status == 1) {
        return 'warning';
    } elseif ($status == 2) {
        return 'primary';
    } elseif ($status == 3) {
        return 'success';
    } elseif ($status == 4) {
        return 'secondary';

    }
}



function delivery_time($d = null)
{
    $times = [
        1=> 'l-3 Days',
        2 =>'1 Week',
        3 => '1-3 Weeks',
        4 => '1 Month ',
        5 => '2-3 Months ',
        6 => '+ 3 Months  ',

    ];

    if ($d !== null) {
        return $times[$d] ?? null;
    }
    return $times;

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
    $query = Khadmat::with(['category', 'user']) // Preload only required relationships
    ->withCount([
        'reviews as total_reviews', // Preload the total review count
        'reviews as average_review' => function ($query) {
            $query->select(DB::raw('COALESCE(AVG(review), 0)')); // Preload average review
        }
    ])
        ->orderByDesc('average_review') // Sort by preloaded average_review
        ->orderBy('created_at', 'desc') // Secondary sort by creation date
        ->take(8)
        ->get();

    return $query;
}




function Khadmat_categories()
{
    return \App\Models\Taqat2\KhadmaCategory::take(8)->get();

}




function getTalents($hasJobs, $limit)
{
    // Fetch the data first
    $query = Talent::Wherefullprofile()
        ->with(['specialization', 'projects', 'work_experiences'])
        ->when($hasJobs, function ($q) {
            return $q->has('jobs');
        }, function ($q) {
            return $q->doesntHave('jobs');
        })
        ->take($limit)
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

function talents()
{
    return getTalents(true, 12); // Fetch talents with jobs
}

function talentsNotHadJobs()
{
    return getTalents(false, 12); // Fetch talents without jobs
}


function companies()
{
    return \App\Models\Taqat2\Company::query()
        ->withCount(['completejobs as completed_projects_count'])
        ->orderBy('completed_projects_count', 'desc') // Order by completed projects count
        ->take(8)
        ->get();
}


?>
