<script>
    const myModal = document.getElementById('create-link-modal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<?php
    if ($_POST['link-destination-url']) {
        create_link($_POST['link-destination-url'], 
        [
            'title'=> 'Sample Title',
            'url_metadata'=> 'JSON[{"":""}]',
            'icon'=> 'https://icon.com/icon',
            'creator'=> 'Daquan Johnson',
            'tags'=> 'tags1,tag2,tag3',
            'analytics'=> '59',
            'qr_code'=> 'https://qr.com/qr',
            'archived'=> 1,
            'comments'=> 'something to say',
            'utm_referal'=> NULL,
            'utm_source'=> NULL,
            'utm_medium'=> NULL,
            'utm_campaign'=> NULL,
            'utm_term'=> NULL,
            'utm_content'=> NULL,
            'user_id'=> NULL
        ], 
        $db);
    }
?>
<div class="modal fade" id="create-link-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index:9999; backdrop-filter: blur(5px);">
    <form action="" method="post" class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Create a new link</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div action="">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Destination URL</label>
                    <input type="text"  name="link-destination-url" class="form-control" id="exampleFormControlInput1" placeholder="https://example.com">
                </div>
                <div class="input-group mb-3">
                    <label for="exampleFormControlInput1" class="form-label w-100">Short URL</label>
                    <!-- <label class="input-group-text" for="inputGroupSelect01">dub.sh</label> -->
                    <select name="link-short-url" class="form-select input-group-text" id="inputGroupSelect01">
                        <option selected>amzn.id</option>
                        <option value="1">chatg.pt</option>
                        <option value="3">fig.page</option>
                        <option value="2">ggl.link</option>
                    </select>
                    <input type="text" name="link-short-url" class="form-control" aria-label="Text input with dropdown button" placeholder="(optional)">
                </div>
                <div class="hstack my-3">
                    <hr class="w-50">
                    <span class="mx-4">Optional</span>
                    <hr class="w-50">
                </div>
                <div class="mb-3">
                    <select name="link-tags" class="form-select" id="inputGroupSelect01">
                        <option selected>Tags</option>
                        <option value="1">chatg.pt</option>
                        <option value="3">fig.page</option>
                        <option value="2">ggl.link</option>
                    </select>
                </div>
                <div class="border-top mt-5 border-bottom">
                    <div class="py-3 hstack">
                        <span class="fw-bold">Comments</span>
                        <div class="form-check form-switch ms-auto">
                            <input name="link-comments-checked" class="form-check-input fs-4" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-bs-toggle="collapse" data-bs-target="#link-comments-collapse" aria-expanded="false" aria-controls="link-comments-collapse">
                            <label class="form-check-label visually-hidden" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                        </div>
                    </div>
                    <div class="w-100 pb-3">
                        <div class="collapse" id="link-comments-collapse">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Add Comments"></textarea>
                        </div>
                    </div>
                </div>
                <div class="border-bottom">
                    <div class="py-3 hstack ">
                        <span class="fw-bold">Custom Social Media Cards</span>
                        <div class="form-check form-switch ms-auto">
                            <input name="link-social-checked" class="form-check-input fs-4" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-bs-toggle="collapse" data-bs-target="#link-social-collapse" aria-expanded="false" aria-controls="link-social-collapse">
                            <label class="form-check-label visually-hidden" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                        </div>
                    </div>
                    <div class="w-100 pb-3">
                        <div class="collapse" id="link-social-collapse">
                            <span class="fw-bold">Title</span>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Title"></textarea>
                            <span class="fw-bold">Description</span>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="border-bottom">
                    <div class="py-3 hstack">
                        <span class="fw-bold">UTM Builder</span>
                        <div class="form-check form-switch ms-auto">
                            <input name="link-utm-checked" class="form-check-input fs-4" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-bs-toggle="collapse" data-bs-target="#link-utm-collapse" aria-expanded="false" aria-controls="link-utm-collapse">
                            <label class="form-check-label visually-hidden" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                        </div>
                    </div>
                    <div class="w-100 pb-3">
                        <div class="collapse" id="link-utm-collapse">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1" style="width: 155px;">UTM Source</span>
                                <input type="text" class="form-control" placeholder="twitter, facebook" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1" style="width: 155px;">UTM Medium</span>
                                <input type="text" class="form-control" placeholder="socail, email" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1" style="width: 155px;">UTM Compaign</span>
                                <input type="text" class="form-control" placeholder="summer_sale" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1" style="width: 155px;">UTM Term</span>
                                <input type="text" class="form-control" placeholder="blue_shoes" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1" style="width: 155px;">UTM Content</span>
                                <input type="text" class="form-control" placeholder="logolink" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1" style="width: 155px;">UTM Referal (ref)</span>
                                <input type="text" class="form-control" placeholder="twitter, facebook" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-bottom">
                    <div class="py-3 hstack">
                        <span class="fw-bold">Password Protection</span>
                        <div class="form-check form-switch ms-auto">
                            <input name="link-password-protect-checked" class="form-check-input fs-4" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-bs-toggle="collapse" data-bs-target="#link-password-collapse" aria-expanded="false" aria-controls="link-password-collapse">
                            <label class="form-check-label visually-hidden" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                        </div>
                    </div>
                    <div class="w-100 pb-3">
                        <div class="collapse" id="link-password-collapse">
                            <input type="password" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Password">
                        </div>
                    </div>
                </div>
                <div class="border-bottom">
                    <div class="py-3 hstack">
                        <span class="fw-bold">Link Expiration</span>
                        <div class="form-check form-switch ms-auto">
                            <input name="link-expiration-checked" class="form-check-input fs-4" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-bs-toggle="collapse" data-bs-target="#link-expiration-collapse" aria-expanded="false" aria-controls="link-expiration-collapse">
                            <label class="form-check-label visually-hidden" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                        </div>
                    </div>
                    <div class="w-100 pb-3">
                        <div class="collapse" id="link-expiration-collapse">
                            <input type="date" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Add Comments">
                        </div>
                    </div>
                </div>
                <!--
                <div class="border-bottom">
                    <div class="py-3 hstack">
                        <span class="fw-bold">Link Cloaking</span>
                        <div class="form-check form-switch ms-auto">
                            <input name="link-cloaking-checked" class="form-check-input fs-4" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-bs-toggle="collapse" data-bs-target="#link-cloaking-collapse" aria-expanded="false" aria-controls="link-cloaking-collapse">
                            <label class="form-check-label visually-hidden" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                        </div>
                    </div>
                    <div class="w-100 pb-3">
                        <div class="collapse" id="link-cloaking-collapse">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Add Comments"></textarea>
                        </div>
                    </div>
                </div>
                <div class="border-bottom">
                    <div class="py-3 hstack">
                        <span class="fw-bold">iOS Targeting</span>
                        <div class="form-check form-switch ms-auto">
                            <input name="link-ios-targeting-checked" class="form-check-input fs-4" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-bs-toggle="collapse" data-bs-target="#link-ios-collapse" aria-expanded="false" aria-controls="link-ios-collapse">
                            <label class="form-check-label visually-hidden" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                        </div>
                    </div>
                    <div class="w-100 pb-3">
                        <div class="collapse" id="link-ios-collapse">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Add Comments"></textarea>
                        </div>
                    </div>
                </div>
                <div class="border-bottom">
                    <div class="py-3 hstack">
                        <span class="fw-bold">Android Targeting</span>
                        <div class="form-check form-switch ms-auto">
                            <input name="link-android-targeting-checked" class="form-check-input fs-4" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-bs-toggle="collapse" data-bs-target="#link-android-collapse" aria-expanded="false" aria-controls="link-android-collapse">
                            <label class="form-check-label visually-hidden" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                        </div>
                    </div>
                    <div class="w-100 pb-3">
                        <div class="collapse" id="link-android-collapse">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Add Comments"></textarea>
                        </div>
                    </div>
                </div>
                <div class="border-bottom">
                    <div class="py-3 hstack">
                        <span class="fw-bold">Geo Targeting</span>
                        <div class="form-check form-switch ms-auto">
                            <input name="link-geo-targeting-checked" class="form-check-input fs-4" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-bs-toggle="collapse" data-bs-target="#link-geo-collapse" aria-expanded="false" aria-controls="link-geo-collapse">
                            <label class="form-check-label visually-hidden" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                        </div>
                    </div>
                    <div class="w-100 pb-3">
                        <div class="collapse" id="link-geo-collapse">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Add Comments"></textarea>
                        </div>
                    </div>
                </div>
                <div class="border-bottom">
                    <div class="py-3 hstack">
                        <span class="fw-bold">Search Engine Indexing</span>
                        <div class="form-check form-switch ms-auto">
                            <input name="link-indexing-checked" class="form-check-input fs-4" type="checkbox" role="switch" id="flexSwitchCheckDefault" data-bs-toggle="collapse" data-bs-target="#link-search-collapse" aria-expanded="false" aria-controls="link-search-collapse">
                            <label class="form-check-label visually-hidden" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                        </div>
                    </div>
                    <div class="w-100 pb-3">
                        <div class="collapse" id="link-search-collapse">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Add Comments"></textarea>
                        </div>
                    </div>
                </div>
                    -->
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create Link</button>
        </div>
        </div>
    </form>
</div>
<div class="card-table col-12">
    <?php include('card-table-header.php'); ?>
    <?php include('card-table-body.php'); ?>
</div>