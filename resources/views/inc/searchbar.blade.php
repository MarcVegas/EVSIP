<div class="ui stackable centered padded grid">
    <div class="row">
        <div class="three wide column"></div>
        <div class="ten wide column">
            <div class="ui searchbar segment">
                <div class="ui stackable grid">
                    <div class="row">
                        <div class="column">
                            <form class="ui large form" action="" method="post">
                                <div class="inline fields">
                                    <label>Search Now</label>
                                    <div class="eight wide field">
                                        <input type="text" name="search" id="search" placeholder="Search course or school">
                                    </div>
                                    <div class="field">
                                        <button class="ui inverted blue button"><i class="search icon"></i> Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="pale row">
                        <div class="column">
                            <form class="ui form" action="" method="post">
                                <div class="inline fields">
                                    <div class="field">
                                        <select class="ui search degree dropdown" name="degree" id="degree">
                                            <option value="">Select Degree</option>
                                            @foreach (Cache::get('course_categ') as $course_categ)
                                                <option value="{{$course_categ}}">{{$course_categ}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="field">
                                        <select class="ui search schooltype dropdown" name="schooltype" id="schooltype">
                                            <option value="">Select School Type</option>
                                            @foreach (Cache::get('category') as $category)
                                                <option value="{{$category}}">{{$category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="field">
                                        <select class="ui search schooltype dropdown" name="category" id="category">
                                            <option value="">Select School Type</option>
                                            @foreach (Cache::get('category') as $category)
                                                <option value="{{$category}}">{{$category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="field">
                                        <button class="ui button" type="submit">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="three wide column"></div>
    </div>
</div>